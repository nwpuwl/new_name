#!/usr/env python

import requests
from bs4 import BeautifulSoup
import ssl


raw_file_content = open("proc_wuxing.txt")

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


guang_contet = open("guanguan.txt")
words_list = []
words_dic = {}
for line in guang_contet:
    strip_line = str.strip(line)
    ss = list(strip_line)
    if len(ss) == 0:
        continue
    for number in range(0, len(ss)):
        end_number = min(number+3, len(ss))
        if (ss[number] == '，' or ss[number] == '。') :
            continue
        for back in range(number+1, end_number):
            if (ss[back] == '，' or ss[back] == '。'):
                break
            result = ss[number]+ss[back]
            if result in words_dic:
                continue
            if ss[number] in wuxing_dict and ss[back] in wuxing_dict:
                words_list.append(result)
                words_dic[result] = wuxing_dict[ss[number]]+wuxing_dict[ss[back]]

#print(words_list)
print(words_dic)

