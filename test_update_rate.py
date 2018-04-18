# -*- coding: utf-8 -*-
"""
Created on Thu Dec 21 11:14:07 2017

@author: d5960
"""

import pymysql
#import time
#import datetime

con = pymysql.connect(host='localhost', user='root', passwd='seedfamily0912', db='sa', port=3306, charset='utf8')
cur = con.cursor()

sql_id = 5

#sql = "CREATE TABLE sa_data_" + str(sql_id) + " (id INT(5) PRIMARY KEY AUTO_INCREMENT NOT NULL, in_meter INT(5), in_status TEXT, on_meter INT(5), on_status TEXT, temp INT(5), time TEXT)"
#cur.execute(sql)

s = 0
m = 0
h = 0
#指定時間
#s = int(input("inputSecond:"))
#m = int(input("inputMinute:"))
#h = int(input("inputHour:"))
while 1:
        
    s = int(input("inputSecond:"))
    sql = "INSERT INTO c_rate( rate,time ) VALUES (%d,'%s')" %( int(s),"123" )
    cur.execute(sql)
    con.autocommit(True)
    
    
con.close()
sql_id += 1