from machine import Pin
from time import sleep
import dht
import urequests
import utime

def gravar():
    sensor = dht.DHT11(Pin(23))
    while True:
        try:
            sleep(1)
            print("Data: " , utime.localtime())
            min = utime.localtime()[4]
            print("min: " , min)
            min = 60 - min
            sensor.measure()
            temp = sensor.temperature()
            umid = sensor.humidity()
            print("Temperatura ", temp)
            print("Umidade ", umid)
            url = "https://www.alessandro.inf.br/temperatura/inserir.php?temp="+str(temp)+"&umid="+str(umid)
            print(url)
            response = urequests.get(url)
            print(response.text)
            response.close() 
            sleep(min*60)
        except OSError as err:
                print(err)

#gravar()
#from ntptime import settime
#settime()
#import utime
# t = utime.localtime()[4]
# min[4] 