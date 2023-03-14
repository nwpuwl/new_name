#!/usr/env python


from pypinyin import lazy_pinyin,Style

word = '齧'
result=lazy_pinyin(word, style=Style.TONE3)

print(word+"的拼音：" +str(result))

