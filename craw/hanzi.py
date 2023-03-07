#!/usr/env python

import requests
from bs4 import BeautifulSoup
#import zhconv

words_index_file = open('../data/words.txt', 'w+')

for page_num in range(2, 72):

    raw_url='https://www.zdic.net/ts/han/word/index_' + str(page_num)+'.htm'
    print(raw_url)

    # 拉取网页
    r = requests.get(raw_url, verify=False)

    web_content = r.content.decode('utf-8')

    # bs
    soup = BeautifulSoup(web_content, "lxml")

    for div_num in range(2, 10):
        selector = 'body > main > div.content-home > div > div:nth-child(' + str(div_num) + ')> div > a > div.yczsl-content > h2'
        selector2 = 'body > main > div.content-home > div > div:nth-child(' + str(div_num) + ')> div > a > div.yczsl-content > div'
        hanzi_list = soup.select(selector)
        hanzi_explain_list = soup.select(selector2)
        if (len(hanzi_list) > 0 and len(hanzi_explain_list)) :
            hanzi_explain = hanzi_explain_list[0].text
            raw_hanzi = hanzi_list[0].text
            hanzi_list = raw_hanzi.split('：')
            hanzi = ''
            if len(hanzi_list) == 2 :
                hanzi = hanzi_list[1]
            else:
                continue

            word_file = open('../data/words/' + hanzi + '.txt', 'w+')
            word_file.write(hanzi_explain)
            word_file.close()

            words_index_file.write(hanzi)
            words_index_file.write('\n')


words_index_file.close()

