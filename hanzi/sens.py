#!/usr/env python

from snownlp import SnowNLP
from snownlp import sentiment 

sentiment.train('neg.txt', 'pos.txt')
sentiment.save('sentiment.marshal')

# 测试词语
word = '美兮'
s1 = SnowNLP(word)
s2 = SnowNLP('逝去')
print(s1.sentiments)
print(s2.sentiments)
