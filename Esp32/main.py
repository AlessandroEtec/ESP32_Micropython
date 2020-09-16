import conectaWiFi
import gravarTemp
from ntptime import settime
from time import sleep

conectaWiFi.conect()
sinc = False
tent = 0
while sinc == False and tent < 5:
    try: 
        settime()
        sinc = True
    except OSError as err:
        print("Time Error: ",err)
        tent += 1
        sleep(3)
gravarTemp.gravar()

