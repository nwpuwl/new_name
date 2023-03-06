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

while True:
    word = input('输入汉字:')
    if word=='N' :
        break
    if word in  wuxing_dict:
        print('五行是: ' + wuxing_dict[word])
    else:
        print("invalid words")
