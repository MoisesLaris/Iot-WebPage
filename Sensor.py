
import RPi.GPIO as GPIO
import time
import smtplib

pir_sensor = 11
piezo = 7


GPIO.setmode(GPIO.BOARD)

GPIO.setup(piezo,GPIO.IN, pull_up_down=GPIO.PUD_DOWN)

GPIO.setup(pir_sensor, GPIO.IN)


current_state = 0
switch = 0
try:
    while GPIO.input(piezo)==GPIO.LOW:
        time.sleep(0.1)
        current_state = GPIO.input(pir_sensor)
        switch = GPIO.input(piezo)
        if current_state == 1:

            print("GPIO pin %s is %s" % (pir_sensor, current_state))
            #GPIO.output(piezo,True)
            #time.sleep(1)
            #GPIO.output(piezo,False)
            FROM = "moisy777@gmail.com"

            #Lista de correos a enviar ...
            TO = ['laris777@hotmail.com','moisy777@gmail.com']

            TOstr = 'moisy777@gmail.com'

            
            server = smtplib.SMTP('smtp.gmail.com',587)
            server.ehlo()
            server.starttls()
            server.ehlo

            #Es necesario logearse con el servidor utilizando tu cuenta micorreo1@gmail.com y tu clave.
            server.login(FROM,'Moises3119402')

            # Crear el encabezado del correo
            header = 'To:' + TOstr + '\n' + 'From: ' + FROM + '\n' + 'Subject:Advertencia de seguridad!\n'
            print header

            # Unir el encabezado con el mensaje ...
            msg = header + '\n ALARMA EN CASA, SE HA DETECTADO MOVIMIENTO INUSUAL. Llame al 911 y atenderemos el caso. \n'

            # Una vez que se haya pasado lo anterior ahora si a enviar ...
            server.sendmail(FROM,TO,msg)
            print "Listo !"

            # Cerramos sesion ...
            server.quit()

            time.sleep(5)
        
            
except KeyboardInterrupt:
    pass
finally:
    print "Alarma Detenida"
    GPIO.cleanup()
