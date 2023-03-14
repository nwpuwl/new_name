#!/usr/env python

import zhconv




sancai_wuxing_dict = dict()
def LoadSancai():
    """
    :return: [key: dict(    # key为天格+人格+地格
                result='',  # 吉凶结果
                evaluate='' # 评价
            ), ...]
    """
    with open("../data/sancai.txt", 'r', encoding='utf8') as f:
        line = f.readline()
        wuxing_comb = line[:3]
        if wuxing_comb not in sancai_wuxing_dict:
            sancai_wuxing_dict[wuxing_comb] = dict(
                    result='',  
                    evaluate=''  
                    )

            is_next_new = False
        while True:
            line = f.readline().strip()
            if is_next_new:
                wuxing_comb = line[:3]
                if wuxing_comb not in sancai_wuxing_dict:
                    sancai_wuxing_dict[wuxing_comb] = dict(
                            result='',  
                            evaluate=''  
                            )
                else:
                    print(wuxing_comb, '重复了？？')
                is_next_new = False
            else:
                if line.startswith('【'):
                    result = line[line.index('【') + 1: line.index('】')]
                    sancai_wuxing_dict[wuxing_comb]['result'] = result
                    is_next_new = True
                else:
                    sancai_wuxing_dict[wuxing_comb]['evaluate'] += line.strip()
                    is_next_new = False

            if not line:
                break
    #print('三才吉凶判断结果：', sancai_wuxing_dict)
    return sancai_wuxing_dict

strokes = []
with open("../data/strokes.txt", 'r', encoding='utf8') as f:
    for line in f:
        strokes.append(line)

def GetStroke(c):
    # 如果返回 0, 则也是在unicode中不存在kTotalStrokes字段
    unicode_ = ord(c)

    if 13312 <= unicode_ <= 64045:
        return strokes[unicode_-13312]
    elif 131072 <= unicode_ <= 194998:
        return strokes[unicode_-80338]
    else:
        return 0


def getSancaiWuxing(x_ge):
    """
    根据天格、人格、地格计算得出五行属性
    尾数为1，2五行为木；尾数为3，4五行为火；尾数为5，6五行为土；尾数为7，8五行为金；尾数为9，0五行为水
    :param x_ge: x格
    :return: 五行
    """
    wuxing = ''
    if (x_ge % 10) in [1, 2]:
        wuxing = '木'
    elif (x_ge % 10) in [3, 4]:
        wuxing = '火'
    elif (x_ge % 10) in [5, 6]:
        wuxing = '土'
    elif (x_ge % 10) in [7, 8]:
        wuxing = '金'
    elif (x_ge % 10) in [9, 0]:
        wuxing = '水'
    return wuxing

kangxi = {}
def LoadingKangxi():
    kangxi_file = open("../data/kangxi.txt", "r+")
    for line in kangxi_file:
        split_list = line.split(' ')
        kangxi[split_list[0]] = int(split_list[1].split('\n')[0])

def CacuStroke(word):
    text1 = zhconv.convert(word, 'zh-hk')
    return kangxi[text1]

# 先只处理单姓问题
def CacuSancai(last_name, name_list):
    if (last_name == "" or
            (len(name_list) != 2 and len(name_list) != 1)) :
        return "" 

    last_name_stroke = CacuStroke(last_name)
    print(last_name+", "+str(last_name_stroke))

    tiange = last_name_stroke + 1

    if len(name_list) == 2:
        mid_name_stroke = CacuStroke(name_list[0])
        print(name_list[0]+", "+str(mid_name_stroke))
        seconde_name_stroke = CacuStroke(name_list[1])
        print(name_list[1]+", "+str(seconde_name_stroke))

        renge = last_name_stroke+mid_name_stroke
        dige = mid_name_stroke+seconde_name_stroke
    else :
        mid_name_stroke = CacuStroke(name_list[0])

        renge = last_name_stroke+mid_name_stroke
        dige = mid_name_stroke+1

    tiange_wuxing =  getSancaiWuxing(tiange)
    renge_wuxing =  getSancaiWuxing(renge)
    dige_wuxing =  getSancaiWuxing(dige)

    sancai_result = tiange_wuxing+renge_wuxing+dige_wuxing

    print(last_name+name_list+", sancai_num:" + str(tiange)+str(renge)+str(dige) +
            ", wuxing:" + sancai_result)

    print(sancai_wuxing_dict[sancai_result])
    return (sancai_result)



if __name__ == "__main__":

    LoadingKangxi()
    LoadSancai()
    CacuSancai("王", "中磊")

