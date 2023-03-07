#!/usr/env python

import requests
from bs4 import BeautifulSoup
import ssl
import zhconv

ssl._create_default_https_context = ssl._create_unverified_context

raw_url='https://humanum.arts.cuhk.edu.hk/Lexis/lexi-mf/radical.php'
#raw_url='https://humanum.arts.cuhk.edu.hk/Lexis/lexi-mf/radical.php?rad=30'


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
bushou_span = {}
for number in range(2, 27) :
    for span_num in range(1, 17) :
        selector_bushou ='#content > div > table > tr > td > table > tr:nth-child(' + str(number) +') > td:nth-child(' + str(span_num) + ') > a'
        selector_span ='#content > div > table > tr > td > table > tr:nth-child(' + str(number) +') > td:nth-child(' + str(span_num) + ') > span'
    
        bushou = soup.select(selector_bushou)
        span = soup.select(selector_span)
        if len(bushou) > 0  and len(span) > 0:
            #print(bushou[0].text)
            #print(span[0].text)
            bushou_span[zhconv.convert(bushou[0].text, 'zh-cn')] = span[0].text

hanzi = {}
for bushou in bushou_span.keys():
    rad_url = 'https://humanum.arts.cuhk.edu.hk/Lexis/lexi-mf/radical.php?rad='+str(bushou_span[bushou])
    print(rad_url)
    rad = requests.get(rad_url, verify=False)
    rad_soup = BeautifulSoup(rad.text, "lxml")
    for line in range(2, 30):
        for parral in range(1, 100):
            selector_hanzi = '#bodyContent > table >  tr > td > table >  tr:nth-child('+str(line) +') > td > a:nth-child('+ str(parral)+') > span'
            #print(selector_hanzi) 
            rad_result = rad_soup.select(selector_hanzi)
            if len(rad_result) > 0:
                hanzi[zhconv.convert(rad_result[0].text, 'zh-cn')] = bushou
print(bushou_span)
print(hanzi)

hanzi_file = open('../data/bushou.txt', 'w+')
for key in hanzi.keys():
    hanzi_file.write(key+ " " + hanzi[key])
    hanzi_file.write('\n')

