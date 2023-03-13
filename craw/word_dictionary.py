#!/usr/env python

import requests
from bs4 import BeautifulSoup

word_dict  = {}

def Loading(book_type):
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

        # 文章全文
        book_content = open("../data/"+ book_class+ "/" + book_id + "_content"+ ".txt")
        for line in book_content:
            strip_line = str.strip(line)
            ss = list(strip_line)
            if len(ss) == 0:
                continue
            for number in range(0, len(ss)):
                if (ss[number] == '，' or ss[number] == '。' or ss[number] == '！' or ss[number] == '；' or ss[number] == '？'):
                    continue
                word_dict[ss[number]] = ""


def RequestDic():
      for key in word_dict:

            # raw url
            raw_url = "https://zd.hwxnet.com/search.do?keyword=" + key
            # 拉取网页
            r = requests.get(raw_url, verify=False)

            # bs
            soup = BeautifulSoup(r.text, "lxml")

            # selector
            selector_hanzi = '#intro > div:nth-child(9)'
            result=soup.select(selector_hanzi)
            if len(result) > 0 :
                word = open("../data/words/" + key + ".txt", "w+")
                word.write(result[0].text)
                word.close()


if  __name__ == "__main__" :
    Loading(1)
    Loading(2)
    Loading(3)
    Loading(4)
    Loading(5)

    RequestDic()

