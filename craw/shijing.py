#!/usr/env python

import requests
from bs4 import BeautifulSoup

raw_url='https://so.gushiwen.cn/gushi/shijing.aspx'


# 拉取网页
r = requests.get(raw_url, verify=False)

# bs
soup = BeautifulSoup(r.text, "lxml")


#selector_hanzi = '#bodyContent > table > tbody > tr > td > table > tbody > tr:nth-child(2) > td > a:nth-child(3) > span'
#selector_hanzi = '#bodyContent > table > tr > td > table > tr:nth-child(3) > td > a:nth-child(2) > span'
#result=soup.select(selector_hanzi)
#print(result)
#exit(0)

# selector
title_href_dic = {}
title_tag_dic = {}
for div_number in range(1, 31):
    for span_number in range(1, 20):
        selector_name = 'body > div.main3 > div.left > div.sons > div:nth-child('+str(div_number) +') > span:nth-child('+ str(span_number) + ') > a'
        name = soup.select(selector_name)
        if len(name) == 0 or 'href' not in name[0].attrs: 
            continue
        href=name[0]['href']
        title_href = 'https://so.gushiwen.cn/'+name[0]['href']
        xxx= href.split('shiwenv_')[1]
        tag = "#contson"+xxx.split('.')[0]

        title_href_dic[name[0].text] = title_href
        title_tag_dic[name[0].text] = tag 

#print(title_href_dic)

title_file = open("../data/shijing_title.txt", "w+")

for title in title_href_dic:
    url = title_href_dic[title]
    selector = title_tag_dic[title]
    print(title+" "+url)
    print(selector)
    title_file.write(title+" "+url)
    title_file.write('\n')


    r = requests.get(url, verify=False)
    soup = BeautifulSoup(r.text, "lxml")
    result = soup.select(selector)
    
    book = open("../data/shijing/"+title+'.txt', "w+")
    book.write(result[0].text)
    book.close()

title_file.close()



