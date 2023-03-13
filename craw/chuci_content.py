#!/usr/env python

from bs4 import BeautifulSoup
import requests

title = open("../data/chuci_title.txt")
for line in title :
    title_2_url  =  line.split(" ")
    if len(title_2_url) != 3 :
        exit(1)

    title_id = title_2_url[0]
    title = title_2_url[1]
    url_proc = title_2_url[2].split("\n")
    url = url_proc[0]

    #url = "https://so.gushiwen.cn/shiwenv_4c5705b99143.aspx"
    print (url)
    selector = "body > div.main3 > div.left > div:nth-child(3) > div > p:nth-child(3)"
    r = requests.get(url, verify=False)
    soup = BeautifulSoup(r.text, "lxml")
    result = soup.select(selector)

    if (len(result) == 0) :
        continue
    content_file_name = "../data/chuci/chuci_" + title_id + ".txt"
    content_tile = open(content_file_name, "w+")

    file_content = result[0].text
    content_tile.write(file_content[2:])
    content_tile.write("\n")

    print(content_file_name)


    
