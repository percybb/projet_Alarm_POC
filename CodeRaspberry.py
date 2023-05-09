import requests
from gpiozero import LED, Button
import socket
from time import sleep

#dir = "https://ageeit-android.000webhostapp.com/alarm/test.php"
dir = "http://192.168.0.200/AndroidToMysql/test.php"

host = "0001"

led1 = LED(17)
btn1 = Button(27)
btn2 = Button(22)
btn3 = Button(18)
btn4 = Button(5)

btnArm = Button(12)

s7a = LED(13)
s7b = LED(6)
s7c = LED(16)
s7d = LED(20)
s7e = LED(21)
s7f = LED(19)
s7g = LED(26)


def disp(nb):
    tab = [[0, 0, 0, 0, 0, 0, 1], [1, 0, 0, 1, 1, 1, 1], [0, 0, 1, 0, 0, 1, 0], [
        0, 0, 0, 0, 1, 1, 0], [1, 0, 0, 1, 1, 0, 0], [0, 1, 1, 0, 0, 0, 0]]
    segm = [s7a, s7b, s7c, s7d, s7e, s7f, s7g]
    for i in range(0, 7):
        if(tab[nb][i] == 0):
            segm[i].off()
        else:
            segm[i].on()


# print(r.text)
pulse1 = 0
pulse2 = 0
pulse3 = 0
pulse4 = 0
pulseArm = 0


def send(arm, dir, z, i):
    if arm:
        r = requests.post(dir, data=z)
        print(r.text)
    else:
        if i == 1:
            print("Alarm z" + str(z['pos']) + " active")
        else:
            print("Alarm z"+str(z['pos']) + " desactive")


def btnOn(index, on_off):
    z['z'+str(index)] = str(on_off)
    print("index: "+str(index))
    z['pos'] = index
    z['s'] = 1
    disp(index)
    if on_off == 1:
        pulse = 1
    else:
        pulse = 0
    sleep(0.05)
    send(arme, dir, z, on_off)
    return pulse


arme = False

disp(0)

z = {'h': host, 'z1': '0', 'z2': '0', 'z3': '0', 'z4': '0', 'pos': 0, 's': 0}
while True:

    if btnArm.is_pressed and pulseArm == 0:
        pulseArm = 1
        sleep(0.05)
        if arme == True:
            arme = False
            led1.off()
            print("Arme = False")
            z = {'h': host, 'z1': z['z1'], 'z2': z['z2'],
                 'z3': z['z3'], 'z4': z['z1'], 'pos': z['pos'], 's': 3}
            r = requests.post(dir, data=z)
        else:
            arme = True
            led1.on()
            print("Arme = True")
            z = {'h': host, 'z1': z['z1'], 'z2': z['z2'],
                 'z3': z['z3'], 'z4': z['z1'], 'pos': z['pos'], 's': 0}
            r = requests.post(dir, data=z)

    elif btnArm.is_pressed == False and pulseArm == 1:
        pulseArm = 0

    if btn1.is_pressed and pulse1 == 0:
        pulse1 = btnOn(1, 1)
    elif btn1.is_pressed == False and pulse1 == 1:
        pulse1 = btnOn(1, 0)

    elif btn2.is_pressed and pulse2 == 0:
        pulse2 = btnOn(2, 1)
    elif btn2.is_pressed == False and pulse2 == 1:
        pulse2 = btnOn(2, 0)

    elif btn3.is_pressed and pulse3 == 0:
        pulse3 = btnOn(3, 1)
    elif btn3.is_pressed == False and pulse3 == 1:
        pulse3 = btnOn(3, 0)

    elif btn4.is_pressed and pulse4 == 0:
        pulse4 = btnOn(4, 1)
    elif btn4.is_pressed == False and pulse4 == 1:
        pulse4 = btnOn(4, 0)
