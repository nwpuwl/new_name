#!/usr/env python

import requests
from bs4 import BeautifulSoup
import ssl
from snownlp import SnowNLP
from snownlp import sentiment 

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


words_list = []
words_dic = {}
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
        print(book_name)

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
                    # 名字候选词
                    result = ss[number]+ss[back]

                    # 情感分析
                    snow_nlp = SnowNLP(result)
                    if (snow_nlp.sentiments < 0.9):
                        print(result+": " + str(snow_nlp.sentiments))
                        continue

                    if result in words_dic:
                        continue
                    if ss[number] in wuxing_dict and ss[back] in wuxing_dict:
                        words_list.append(result)
                        # 词对应的五行
                        wuxing_result = wuxing_dict[ss[number]]+wuxing_dict[ss[back]]
                        words_dic[result] = wuxing_result
                        if wuxing_result in result_dict:
                            list_word_list = result_dict[wuxing_result]
                            list_word_list.append(result)
                        else :
                            list_word_list = []
                            list_word_list.append(result)
                            result_dict[wuxing_result] = list_word_list



loading(1)
loading(2)
loading(3)
loading(4)
loading(5)
print(result_dict)

