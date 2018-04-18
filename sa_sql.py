# -*- coding: utf-8 -*-
"""
Created on Thu Dec 21 11:14:07 2017

@author: d5960
"""

import requests
import pymysql
#import datetime

con = pymysql.connect(host='localhost', user='root', passwd='sa0113', db='sa', port=3306, charset='utf8')
cur = con.cursor()

sql_id = 5

#sql = "CREATE TABLE sa_data_" + str(sql_id) + " (id INT(5) PRIMARY KEY AUTO_INCREMENT NOT NULL, in_meter INT(5), in_status TEXT, on_meter INT(5), on_status TEXT, temp INT(5), time TEXT)"
#cur.execute(sql)

s = 0
m = 0
h = 0
i = 0

Today = "2018/1/13"
MakeOrderID = "MO101"
IWorkID = "IJ01"
OWorkID = "OJ01"
MachineID ="C11"
IShaftID = "C11-I1"
OShaftID = "C11-O1"
ILineID ="L101"
OLineID = "L201"

OrderStartTime = "00:00:00"
OrderEndTime = "01:00:00"



MaCon =""
TempCon = ""
RateCon =""
timer = 0 
timer_old_in = 0
timer_in = 0
timer_old_out = 0
timer_out = 0

s = int(input("inputSecond:"));
m = int(input("inputMinute:"));
h = int(input("inputHour:"));


olderIM = 0
olderIMT = 0
IlineSpeed = 0

olderOM = 0
olderOMT = 0
OlineSpeed = 0
OldOlineSpeed = 0

rate = 0
OM = 0


istart = True
ostart = True
IST = ""
ISM = 0
OST = ""
OSM = 0

allsecond = 0
FirstRun = True

OT = 0
Execution_time = 0
Execution_alltime = 0
axis_times = 0
First_Reach = 0
while 1:
    res_i_meter = requests.get("http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11-I1&sid=C11-I1-Meter&time="+str(h)+":"+str(m)+":"+str(s))
    res_i_status = requests.get("http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11-I1&sid=C11-I1-Position&time="+str(h)+":"+str(m)+":"+str(s))
    res_o_meter = requests.get("http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11-O1&sid=C11-O1-Meter&time="+str(h)+":"+str(m)+":"+str(s))
    res_o_status = requests.get("http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11-O1&sid=C11-O1-Position&time="+str(h)+":"+str(m)+":"+str(s))
    res_temp = requests.get("http://etouch20.cycu.edu.tw:5146/simone/read/?mid=C11&sid=C11-Thermal&time="+str(h)+":"+str(m)+":"+str(s))
    
    i_meter = res_i_meter.json()
    i_status = res_i_status.json()
    o_meter = res_o_meter.json()
    o_status = res_o_status.json()
    temp = res_temp.json()
    allsecond = h*60*60+m*60+s
    
    if int(temp['data']) > 120:    #溫度異常判斷
        TempCon = "溫度過高"
    else:
        TempCon = "溫度正常"
    
    if i_status['data'] != '0':
        if istart == True:                 #存開始時間到投入工作
            sql = "UPDATE iwork SET StartTime = '%s',EndTime = '%s',StartLong = %d,EndLong = %d" %(temp['time'],temp['time'],int(i_meter['data']),int(i_meter['data'])) 
            cur.execute(sql)
            IST = temp['time']
            ISM = int(i_meter['data'])
            istart = False
        else:
            sql = "UPDATE iwork SET StartTime = '%s',EndTime = '%s',StartLong = %d,EndLong = %d" %(IST,temp['time'],ISM,int(i_meter['data'])) 
            cur.execute(sql)
        if o_status['data'] != '0':
            if ostart == True:                 #存開始時間到產出工作
                sql = "UPDATE owork SET StartTime = '%s',EndTime = '%s',StartLong = %d,EndLong = %d WHERE status = '%s'" %(temp['time'],temp['time'],int(o_meter['data']),int(o_meter['data']),o_status['data']) 
                cur.execute(sql)
                OST = temp['time']
                OT = allsecond
                OSM = int(o_meter['data'])
                ostart = False
                Execution_alltime += Execution_time #總共產出時間
            else:
                sql = "UPDATE owork SET StartTime = '%s',EndTime = '%s',StartLong = %d,EndLong = %d WHERE status = '%s'" %(OST,temp['time'],OSM,int(o_meter['data']),o_status['data']) 
                cur.execute(sql)
                Execution_time = allsecond - OT # 單一產出時間
                if Execution_time > 720 :       #判斷產出超出工時
                    MaCon = "14"
                
            if allsecond < 540:   #9分前整備
                MaCon = "4"
            else:
                if FirstRun :
                    olderIM = int(i_meter['data'])  #存第一筆資料
                    olderIMT = allsecond
                    olderOM = int(o_meter['data'])  #存第一筆資料
                    olderOMT = allsecond
                    FirstRun = False
                    IlineSpeed = 0
                    OlineSpeed = 0
                    minutespeed = 0
                    rate = 0
                    timer == 0
                    OM = int(o_meter['data'])
                    axis_times +=1
                    timer_old_out = 0
                    timer_old_in = 0
                else:
                    if olderIM != int(i_meter['data']):
                        IlineSpeed = "%1.2f" % float(((olderIM - int(i_meter['data'])) / (allsecond - olderIMT))*60*60) #算投入線速
                        rate = int(o_meter['data']) - OM
                        OM = int(o_meter['data'])
                        olderIM = int(i_meter['data'])
                        olderIMT = allsecond
                        print("投入線速:"+IlineSpeed)
                    if olderOM != int(o_meter['data']):
                        OlineSpeed = "%1.2f" % float(((int(o_meter['data']) - olderOM) / (allsecond - olderOMT))*60*60) #算產出線速
                        olderOM = int(o_meter['data'])
                        olderOMT = allsecond
                        print("產出線速:"+OlineSpeed)
                        
                    print(timer)
                    print(timer_old_out)
                   #10秒算一次4           
                    if allsecond%10 == 0:
                        timer_old_in = float(IlineSpeed) - float(timer_in)
                        timer_old_out = float(OlineSpeed) - float(timer_out)
                    elif allsecond%10 == 1:
                        timer_in = IlineSpeed
                        timer_out = OlineSpeed
                    
                        
                if rate > 6.15 or rate < 5.99:    #轉換率異常判斷
                    RateCon ="轉換率異常"
                else:
                    RateCon ="轉換率正常"
                    
                
                if First_Reach == 0 :
                    if float(OlineSpeed) < 1100.00:
                        if float(timer_old_out) > 0.00 and float(timer_old_out) <= 400.00:
                            MaCon = "2"
                        elif float(timer_old_out) < 0.00 and float(timer_old_out) >= -400.00:
                            MaCon = "3"
                        elif float(timer_old_out) > 400.00 or float(timer_old_out) < -400.00:
                            MaCon = "8"
                        else:
                            MaCon = "6"
                    elif float(OlineSpeed) >=1100.00 and float(OlineSpeed) <= 1300.00:
                        First_Reach == 1
                        MaCon = "1"
                    else:
                        MaCon = "7"
                elif First_Reach == 1:
                    if float(OlineSpeed) > 1300.00:
                        First_Reach == 0
                        MaCon = "7"
                    elif float(OlineSpeed) < 1100.00:
                        if float(timer_old_out) < 0.00 and float(timer_old_out) >= -400.00:
                            MaCon = "3"
                        else:
                            First_Reach == 0
                            MaCon = "6"
                    elif float(OlineSpeed) >=1100.00 and float(OlineSpeed) <= 1300.00:
                        MaCon = "1"
        else:
            FirstRun = True
            IlineSpeed = 0
            OlineSpeed = 0
            minutespeed = 0
            rate = 0
            MaCon = "9"
    else:
        FirstRun = True
        if float(OlineSpeed) == 1200.00: #如果前一秒線速是1200判斷為紫燈
            MaCon = "5"
        elif MaCon == "5":
            MaCon = "5"
        else:
            MaCon = "9"
        IlineSpeed = 0
        OlineSpeed = 0
        minutespeed = 0
        rate = 0
        if axis_times*200 == 600:
            MaCon = "15"
            if Execution_alltime > 36*60:
                MaCon = "16"
        
    
    if temp['time'] == "00:22:00":
        IWorkID = "IJ01"
        OWorkID = "OJ02"
        ILineID ="L101"
        OLineID = "L202"
    elif temp['time'] == "00:42:00":
        IWorkID = "IJ01"
        OWorkID = "OJ03"
        ILineID ="L101"
        OLineID = "L203"  
    print(i_meter)
    print(i_status)
    print(o_meter)
    print(o_status)
    print(temp)
    print("-----------------------------------------")

    sql = "INSERT INTO history (Date,POrder,IWorkID,OWorkID,MachineID,IShaftID,OShaftID,IAxleID,OAxleID,ILineID,OLineID,I_Meter, O_Meter,Temp,ISpeed,OSpeed,OrderStartTime,OrderEndTime,MaCon, rate,timer_10_in,timer_10_out,TempCon,RateCon) VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )" %( Today, MakeOrderID, IWorkID, OWorkID, MachineID, IShaftID, OShaftID, i_status['data'], o_status['data'], ILineID, OLineID,i_meter['data'],o_meter['data'],temp['data'], str(IlineSpeed), str(OlineSpeed), OrderStartTime, temp['time'], MaCon, str(rate), str(timer_old_in),str(timer_old_out),TempCon,RateCon)
    cur.execute(sql)

#    sql = "INSERT INTO sa_data_5 (i_meter, i_status, o_meter, o_status, temp, time,IlineSpeed,OlineSpeed, rate) VALUES (%d, '%s', %d, '%s', %d, '%s', '%s', '%s', '%s')" %(int(i_meter['data']), i_status['data'], int(o_meter['data']), o_status['data'], int(temp['data']), temp['time'], str(IlineSpeed), str(OlineSpeed), str(rate))
#    cur.execute(sql)
    
    sql = "UPDATE oshaft SET status = '%s',meter = %d" %(o_status['data'],int(o_meter['data']) )
    cur.execute(sql)
    
    sql = "UPDATE ishaft SET status = '%s',meter = %d" %(i_status['data'],int(i_meter['data']) )
    cur.execute(sql)
    
    con.autocommit(True)
    s += 1
    if h == 1 and m == 0 and s == 0 :
        break
    
    if s == 60 :
        m += 1
        s = 0
    
    if m == 60 :
        h += 1
        m = 0
        
con.close()
sql_id += 1