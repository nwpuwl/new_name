#!/usr/env python

import requests
from bs4 import BeautifulSoup
import ssl
from snownlp import SnowNLP
from snownlp import sentiment 
import urllib.parse
import time
import zhconv

import http.server
import socketserver
import json
import ngender
import random
import os



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

# book_id:{}
book_id_content = {}
# book_hanyi:{}
book_id_hanyi = {}
# book_id_name:{}
book_id_name = {}
# book_id_class:{}
book_id_class = {}

# words_dictionary
words_dictionary={}

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
        book_name = book.split(' ')[1]
        book_id = book_class+"_"+book.split(' ')[0]

        # book name
        book_id_name[book_id] = book_name
        # book_class
        book_id_class[book_id] = book_class
        # 文章译文
        book_hanyi = open("../data/" + book_class + "/" + book_id + ".txt", "r+")
        book_id_hanyi[book_id] = book_hanyi.readlines()
        book_hanyi.close()

        # 文章全文
        book_content = open("../data/"+ book_class+ "/" + book_id + "_content"+ ".txt")
        book_id_content[book_id] = book_content.readlines()
        book_content.seek(0)
        for line in book_content:
            strip_line = str.strip(line)
            ss = list(strip_line)
            if len(ss) == 0:
                continue
            for number in range(0, len(ss)):
                end_number = min(number+10, len(ss))
                if (ss[number] == '，' or ss[number] == '。' or ss[number] == '！' or ss[number] == '；' or ss[number] == '？'):
                    continue
                for back in range(number+1, end_number):
                    if (ss[back] == '，' or ss[back] == '。' or ss[back] == '！' or ss[back] == '；' or ss[back] == '？'):
                        continue
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
                    if (snow_nlp.sentiments < 0.92):
                        #print('words: '+words+ ', sentiments: ' + str(snow_nlp.sentiments))
                        continue

                    # 双词对应的五行
                    wuxing_result = []
                    wuxing_result.append(wuxing_dict[ss[number]])
                    wuxing_result.append(wuxing_dict[ss[back]])

                    # 名字候选词
                    guess_gender = ngender.guess(words)

                    result = {}
                    result['words'] = words
                    result['book'] = book_name
                    result['wuxing'] = wuxing_result 
                    result['sentiments'] = snow_nlp.sentiments 
                    result['book_line'] = line 
                    result['gender'] = guess_gender[0]
                    result['book_id'] = book_id

                    words_dic[words] = result 
                    words_list.append(result)


                    # 双五行
                    double_wuxing = ""
                    dict_sort = [] 
                    dict_sort.append(wuxing_dict[ss[number]])
                    dict_sort.append(wuxing_dict[ss[back]])
                    dict_sort.sort()
                    for dict_key in dict_sort:
                        double_wuxing += dict_key

                    if double_wuxing in result_dict:
                        list_word_list = result_dict[double_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[double_wuxing] = list_word_list

                    # 性别+双五行
                    double_wuxing_with_sex = guess_gender[0] + double_wuxing
                    if double_wuxing_with_sex in result_dict:
                        list_word_list = result_dict[double_wuxing_with_sex]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[double_wuxing_with_sex] = list_word_list

                    # 单五行
                    single_wuxing = wuxing_dict[ss[number]]
                    if single_wuxing in result_dict:
                        list_word_list = result_dict[single_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_wuxing] = list_word_list

                    single_wuxing_with_sex = guess_gender[0] + single_wuxing
                    if single_wuxing_with_sex in result_dict:
                        list_word_list = result_dict[single_wuxing_with_sex]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_wuxing_with_sex] = list_word_list

                    # 单五行
                    single_back_wuxing = wuxing_dict[ss[back]]
                    if single_back_wuxing in result_dict:
                        list_word_list = result_dict[single_back_wuxing]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_back_wuxing] = list_word_list

                    single_back_wuxing_with_sex = guess_gender[0] + single_back_wuxing
                    if single_back_wuxing_with_sex in result_dict:
                        list_word_list = result_dict[single_back_wuxing_with_sex]
                        list_word_list.append(result)
                    else :
                        list_word_list = []
                        list_word_list.append(result)
                        result_dict[single_back_wuxing_with_sex] = list_word_list



class MyHandler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('Content-type', 'application/json;charset=utf-8')
        self.end_headers()

        # 输入串处理
        path = self.path
        req_list = path.split('/')[1].split('?')[0]
        if (req_list == "wuxing") :
            json_data  = ProcWuxing(path)
            self.wfile.write(json_data.encode())
        elif (req_list == "content_detail") :
            json_data  = ContentDetail(path)
            self.wfile.write(json_data.encode())
        elif (req_list == "words_dictionary") :
            json_data  = WordsDictionary(path)
            self.wfile.write(json_data.encode())
        elif (req_list == "sancai") :
            json_data  = SanCai(path)
            self.wfile.write(json_data.encode())
        else :
            data = {
                    "error": "invalid param"
                    }
            json_data = json.dumps(data, ensure_ascii=False)
            self.wfile.write(json_data.encode())

def WordsDictionary(path):
    req_list  = path.split('?')
    req_param = {}
    if len(req_list) > 1:
        req = req_list[1].split('&')
        for str_param in req:
            param = str_param.split('=')
            if len(param) > 1:
                req_param[param[0]] = urllib.parse.unquote(param[1])

    data = {}
    if ('words1' in req_param and 'words2' in req_param):
        data["words1"] = words_dictionary[req_param['words1']]
        data["words2"] = words_dictionary[req_param['words2']]
    else :
        data = {
                "error": "invalid param"
                }

        json_data = json.dumps(data, ensure_ascii=False)
    return json_data

def ContentDetail(path):
    req_list  = path.split('?')
    req_param = {}
    if len(req_list) > 1:
        req = req_list[1].split('&')
        for str_param in req:
            param = str_param.split('=')
            if len(param) > 1:
                req_param[param[0]] = urllib.parse.unquote(param[1])

    data = {}
    if ('book_id' in req_param ):
        book_id = req_param['book_id']
        book_class = book_id.split('_')
        data["book_name"] = book_id_name[book_id]
        data["book_class"] = book_id_class[book_id]
        data["raw_content"] = book_id_content[book_id]
        data["hanyi"] = book_id_hanyi[book_id]
    else :
        data = {
                "error": "invalid param"
                }

        json_data = json.dumps(data, ensure_ascii=False)
    return json_data


def ProcWuxing(path) :
    req_list  = path.split('?')
    req_param = {}
    if len(req_list) > 1:
        req = req_list[1].split('&')
        for str_param in req:
            param = str_param.split('=')
            if len(param) > 1:
                req_param[param[0]] = urllib.parse.unquote(param[1])

    if ('wuxing' in req_param and 
            'first_name' in req_param and 
            'gender' in req_param):
        result = FindNameList(req_param['wuxing'], req_param['first_name'],
                req_param['gender'])
        data = {
                }
        data['result'] = result 
        #json_data = json.dumps(data, ensure_ascii=False)
    else :
        data = {
                "error": "invalid param"
                }

        json_data = json.dumps(data, ensure_ascii=False)
    return json_data


def FindNameList(str_wuxing, first_name, gender):
    name = [] 

    dict_sort = [] 
    find_wuxing = ""
    if (str_wuxing.isdigit()) :
        wuxing_num = int(str_wuxing) 
        if (wuxing_num&1 == 1):
            dict_sort.append("金")

        if (wuxing_num & 2 == 2 ):
            dict_sort.append("木")

        if (wuxing_num & 4 == 4 ):
            dict_sort.append("水")

        if (wuxing_num & 8 == 8 ):
            dict_sort.append("火")

        if (wuxing_num & 16  == 16 ):
            dict_sort.append("土")

        dict_sort.sort()
        for key in dict_sort:
            find_wuxing += key

    else :
        find_wuxing = "xxx"

    if (gender == "male" or gender == "female") :
        find_wuxing = (gender + find_wuxing)

    time_stamp = int(time.time())
    random.seed(time_stamp)
    print(time_stamp)

    if find_wuxing in result_dict:
        result_list = result_dict[find_wuxing]
        #print(result_list)
        if len(result_list) > 0 :
            for times in range(1, 20):
                list_index = random.randint(1,100000)%len(result_list)
                name.append(result_list[list_index])
    else :
        if len(words_list) > 0 :
            for times in range(1, 20):
                list_index = random.randint(1,100000)%len(words_list)
                name.append(words_list[list_index])
    return(name)

def LoadWordDictionary():
    for file_name in os.listdir("../data/words/"):
        word = file_name.split(".")[0]
        word_content = open("../data/words/"+file_name, 'r+')
        words_dictionary[word] = word_content.readlines()


kangxi = {}
def LoadingKangxi():
    kangxi_file = open("../data/kangxi.txt", "r+")
    for line in kangxi_file:
        split_list = line.split(' ')
        kangxi[split_list[0]] = int(split_list[1].split('\n')[0])


sancai_wuxing_dict = dict()
def LoadSancai():
    with open("../data/sancai.txt", 'r', encoding='utf8') as f:
        line = f.readline()
        wuxing_comb = line[:3]
        if wuxing_comb not in sancai_wuxing_dict:
            sancai_wuxing_dict[wuxing_comb] = dict(
                    result='',  
                    evaluate=''  
                    )

            is_next_new = False
        while True:
            line = f.readline().strip()
            if is_next_new:
                wuxing_comb = line[:3]
                if wuxing_comb not in sancai_wuxing_dict:
                    sancai_wuxing_dict[wuxing_comb] = dict(
                            result='',  
                            evaluate=''  
                            )
                else:
                    print(wuxing_comb, '重复了？？')
                is_next_new = False
            else:
                if line.startswith('【'):
                    result = line[line.index('【') + 1: line.index('】')]
                    sancai_wuxing_dict[wuxing_comb]['result'] = result
                    is_next_new = True
                else:
                    sancai_wuxing_dict[wuxing_comb]['evaluate'] += line.strip()
                    is_next_new = False

            if not line:
                break
    #print('三才吉凶判断结果：', sancai_wuxing_dict)
    return sancai_wuxing_dict

def CacuStroke(word):
    text1 = zhconv.convert(word, 'zh-hk')
    return kangxi[text1]

def getSancaiWuxing(x_ge):
    """
    根据天格、人格、地格计算得出五行属性
    尾数为1，2五行为木；尾数为3，4五行为火；尾数为5，6五行为土；尾数为7，8五行为金；尾数为9，0五行为水
    :param x_ge: x格
    :return: 五行
    """
    wuxing = ''
    if (x_ge % 10) in [1, 2]:
        wuxing = '木'
    elif (x_ge % 10) in [3, 4]:
        wuxing = '火'
    elif (x_ge % 10) in [5, 6]:
        wuxing = '土'
    elif (x_ge % 10) in [7, 8]:
        wuxing = '金'
    elif (x_ge % 10) in [9, 0]:
        wuxing = '水'
    return wuxing


def CacuSancai(last_name, name_list):
    #print("CacuSancai: " + last_name+name_list)
    if (last_name == "" or
            (len(name_list) != 2 and len(name_list) != 1)) :
        return "" 

    last_name_stroke = CacuStroke(last_name)
    #print(last_name+", "+str(last_name_stroke))

    tiange = last_name_stroke + 1

    if len(name_list) == 2:
        mid_name_stroke = CacuStroke(name_list[0])
        #print(name_list[0]+", "+str(mid_name_stroke))
        seconde_name_stroke = CacuStroke(name_list[1])
        #print(name_list[1]+", "+str(seconde_name_stroke))

        renge = last_name_stroke+mid_name_stroke
        dige = mid_name_stroke+seconde_name_stroke
    else :
        mid_name_stroke = CacuStroke(name_list[0])

        renge = last_name_stroke+mid_name_stroke
        dige = mid_name_stroke+1

    tiange_wuxing =  getSancaiWuxing(tiange)
    renge_wuxing =  getSancaiWuxing(renge)
    dige_wuxing =  getSancaiWuxing(dige)

    sancai_result = tiange_wuxing+renge_wuxing+dige_wuxing

    #print(last_name+name_list+", sancai_num:" + str(tiange)+str(renge)+str(dige) +
    #        ", wuxing:" + sancai_result)

    if sancai_result in sancai_wuxing_dict.keys():
        #print(sancai_wuxing_dict[sancai_result])
        return (sancai_wuxing_dict[sancai_result])

    else:
        tmp = {}
        tmp["result"] = "no"
        return tmp
        



def SanCai(path) :
    req_list  = path.split('?')
    req_param = {}
    if len(req_list) > 1:
        req = req_list[1].split('&')
        for str_param in req:
            param = str_param.split('=')
            if len(param) > 1:
                req_param[param[0]] = urllib.parse.unquote(param[1])

        if ('first_name' in req_param and 
                'gender' in req_param):
            result = ProcSanCai(req_param['first_name'], req_param['gender'])
            data = {}
            data['result'] = result 
    else :
        data = {
                "error": "invalid param"
                }

    json_data = json.dumps(data, ensure_ascii=False)
    return json_data

def ProcSanCai(first_name, gender) :
    name = []
    index = 0
    if (gender != "male" and gender != "female") :
        return(name)

    for words in words_list: 
        #print("ProcSanCai:" + str(words[words]))
        sancai_result = CacuSancai(first_name, words['words'])
        if '凶' in sancai_result['result']:
            continue
        else :
            if (words["gender"] != gender):
                continue
            words["result"] = sancai_result
            name.append(words)
            index = index + 1
            if (index > 200):
                return (name)

    return(name)



def Load():
    LoadWordDictionary()
    LoadingKangxi()
    LoadSancai()

    loading(1)
    loading(2)
    loading(3)
    loading(4)
    loading(5)
    print("loading done")

if __name__ == '__main__':
    Load()

    handler_object = MyHandler
    my_server = socketserver.TCPServer(("10.0.0.10", 12345), handler_object)
    #my_server.socket = ssl.wrap_socket(my_server.socket, certfile='../../ssl/Apache/2_test.you-xu.cn.crt',  
    #        keyfile='../../ssl/Apache/3_test.you-xu.cn.key' ,server_side=True, ssl_version=ssl.PROTOCOL_TLS)
    #my_server.socket = ssl.wrap_socket(my_server.socket, certfile='../data//server.pem', server_side=True)
    my_server.serve_forever()

