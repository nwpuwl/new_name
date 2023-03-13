#!/bin/sh

cat ../data/shijing_title.txt | while read line
do 
    id="../data/shijing/shijing_`echo $line|awk '{print $1}'`_content.txt"
    name="../data/shijing/`echo $line|awk '{print $2}'`.txt"
    mv $name $id -f
done

cat ../data/chuci_title.txt | while read line
do 
    id="../data/chuci/chuci_`echo $line|awk '{print $1}'`_content.txt"
    name="../data/chuci/`echo $line|awk '{print $2}'`.txt"
    mv $name $id -f
done

cat ../data/tangshi_title.txt | while read line
do 
    id="../data/tangshi/tangshi_`echo $line|awk '{print $1}'`_content.txt"
    name="../data/tangshi/`echo $line|awk '{print $2}'`.txt"
    mv $name $id -f
done

cat ../data/songci_title.txt | while read line
do 
    id="../data/songci/songci_`echo $line|awk '{print $1}'`_content.txt"
    name="../data/songci/`echo $line|awk '{print $2}'`.txt"
    mv $name $id -f
done

cat ../data/yuefu_title.txt | while read line
do 
    id="../data/yuefu/yuefu_`echo $line|awk '{print $1}'`_content.txt"
    name="../data/yuefu/`echo $line|awk '{print $2}'`.txt"
    mv $name $id -f
done
