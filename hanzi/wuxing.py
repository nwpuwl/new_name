#!/usr/env python

import requests
from bs4 import BeautifulSoup
import ssl
from snownlp import SnowNLP
from snownlp import sentiment 
import urllib.parse

import http.server
import socketserver
import json
import random



sentiment.train('../data/neg.txt', '../data/pos.txt')
sentiment.save('../data/sentiment.marshal')

raw_file_content = open("../data/proc_wuxing.txt")

wuxing_dict={}
for line in raw_file_content:
    strip_line = str.strip(line)
    if len(strip_line) == 0 :
        continue
    strip_line_list = strip_line.split(' ')
    if len(strip_line_list) != 2 :
        continue
    #print(strip_line_list)
    wuxing_dict[strip_line_list[0]] = strip_line_list[1]


words_dic = {}
words_list = []
#五行严格顺序
result_dict = {}



def loading(book_type):
    if book_type == 1:
        book_class = 'shijing'
    elif book_type == 2:
        book_class = 'yuefu'
    elif book_type == 3:
        book_class = 'chuci'
    elif book_type == 4:
        book_class = 'tangshi'
    elif book_type == 5:
        book_class = 'songci'
    else :
        return(0)
    book_title = open("../data/"+book_class+"_title.txt")

    for book in book_title:
        book_name = book.split(' ')[0]
        #print(book_name)

        book_content = open("../data/"+ book_class+ "/" + book_name + ".txt")


        for line in book_content:
            strip_line = str.strip(line)
            ss = list(strip_line)
            if len(ss) == 0:
                continue
            for number in range(0, len(ss)):
                end_number = min(number+3, len(ss))
                if (ss[number] == '，' or ss[number] == '。' or ss[number] == '！') :
                    continue
                for back in range(number+1, end_number):
                    if (ss[back] == '，' or ss[back] == '。' or ss[number] == '！'):
                        break
                    if (ss[number] == ss[back]) :
                        continue

                    if ss[number] not in wuxing_dict or ss[back] not in wuxing_dict:
                        continue

                    words =  ss[number]+ss[back]
                    # 已出现过的词过滤
                    if words in words_dic:
                        continue

                    # 情感分析
                    snow_nlp = SnowNLP(words)
                    if (snow_nlp.sentiments < 0.9):
                        print('words: '+words+ ', sentiments: ' + str(snow_nlp.sentiments))
                        continue

                    # 双词对应的五行
                    wuxing_result = []
                    wuxing_result.append(wuxing_dict[ss[number]])
                    wuxing_result.append(wuxing_dict[ss[back]])

                    # 名字候选词
                    result = {}
                    result['words'] = words
                    result['book'] = book_name
                    result['wuxing'] = wuxing_result 
                    result['sentiments'] = snow_nlp.sentiments 

                    words_dic[words] = result 
                    words_list.append(result)

                    # 双五行
                    double_wuxing = wuxing_dict[ss[number]] + wuxing_dict[ss[back]]
                    if double_wuxing in result_dict:
                        list_word_list = result_dict[double_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[double_wuxing] = list_word_list

                    # 单五行
                    single_wuxing = wuxing_dict[ss[number]]
                    if single_wuxing in result_dict:
                        list_word_list = result_dict[single_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_wuxing] = list_word_list

                    # 单五行
                    single_back_wuxing = wuxing_dict[ss[back]]
                    if single_back_wuxing in result_dict:
                        list_word_list = result_dict[single_back_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_back_wuxing] = list_word_list


class MyHandler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('Content-type', 'application/json;charset=utf-8')
        self.end_headers()

        # 输入串处理
        path = self.path
        req_list  = path.split('/')
        req_param = {}
        if len(req_list) > 1:
            req = req_list[1].split('&')
            for str_param in req:
                param = str_param.split('=')
                if len(param) > 1:
                    req_param[param[0]] = urllib.parse.unquote(param[1])
        print(req_param)

        if ('wuxing' in req_param and 
                'first_name' in req_param):
            result = FindNameList(req_param['wuxing'], req_param['first_name'])
            data = {
            }
            data['result'] = result 
            json_data = json.dumps(data, ensure_ascii=False)

            print("json_data: " +json_data + ", result:" + str(result) + ", data: " + str(data))
            self.wfile.write(json_data.encode())
        else :
            data = {
                 "error": "invalid param"
                }

            json_data = json.dumps(data)
            self.wfile.write(json_data.encode())

def FindNameList(str_wuxing, first_name):
    name = [] 
    
    if str_wuxing in result_dict:
        result_list = result_dict[str_wuxing]
        #print(result_list)
        if len(result_list) > 0 :
            for times in range(1, 10):
                list_index = random.randint(1,100000)%len(result_list)
                name.append(result_list[list_index])
    else :
        if len(words_list) > 0 :
            for times in range(1, 10):
                list_index = random.randint(1,100000)%len(words_list)
                name.append(words_list[list_index])
    return(name)


def Load():
    loading(1)
    loading(2)
    loading(3)
    loading(4)
    loading(5)
    print(result_dict)

if __name__ == '__main__':
    Load()

    handler_object = MyHandler
    my_server = socketserver.TCPServer(("10.0.0.10", 8000), handler_object)
    my_server.socket = ssl.wrap_socket(my_server.socket, certfile='../data//server.pem', server_side=True)
    my_server.serve_forever()

