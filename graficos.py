#!/usr/bin/python

# Importa las librerias necesarias 
import time
import datetime
import Adafruit_DHT

# Log file
log_path = "/var/log/iot/"

# Configuracion del tipo de sensor DHT
sensor = Adafruit_DHT.DHT11

# Configuracion del puerto GPIO al cual esta conectado (GPIO 23)
pin = 23

# Escribe un archivo log en log_path con el nombre en el formato yyyy-mm-dd_dht.log
def write_log(text,tx):
	log = open("grafica.txt","w")
	line =text + "\n"+tx
	log.write(line)
	log.close()
	
def write_log2(text):
        log1 = open("RegistroTemperatura.txt","a")
	log1.write(text)
	log1.close()

# Intenta ejecutar las siguientes instrucciones, si falla va a la instruccion except
try:
	# Ciclo principal infinito
	while True:
		# Obtiene la humedad y la temperatura desde el sensor 
		humedad, temperatura = Adafruit_DHT.read_retry(sensor, pin)

		# Si obtiene una lectura del sensor la registra en el archivo log
		if humedad is not None and temperatura is not None:
			write_log("%s" % str(temperatura),"%s" % str(humedad))
			write_log2(datetime.datetime.now().strftime("%Y-%m-%d") + "\n")
			write_log2(datetime.datetime.now().strftime("%H:%M:%S") + "\n")
			write_log2("%s" % str(temperatura))
			write_log2("\n")
			write_log2("%s" % str(humedad))
			write_log2("\n")
		else:
			write_log('0','0')
                        write_log2('0')
                        write_log2("\n")
			write_log2('0')
			write_log2("\n")
			write_log2('0')
			write_log2("\n")
                        write_log2('0')
                        write_log2("\n")
		# Duerme 10 segundos
		time.sleep(0)

# Se ejecuta en caso de que falle alguna instruccion dentro del try
except Exception,e:
	# Registra el error en el archivo log y termina la ejecucion
	write_log('0','0')
