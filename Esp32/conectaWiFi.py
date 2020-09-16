import network

def conect():
    ssid = "Alessandro"
    password = "3214567890"
    
    station = network.WLAN(network.STA_IF)
    if station.isconnected():
        print("Conectado")
        return
    station.active(True)
    station.connect(ssid, password)
    while station.isconnected() == False:
        pass
    print("Conexao bem sucedida")
    print(station.ifconfig())
              

