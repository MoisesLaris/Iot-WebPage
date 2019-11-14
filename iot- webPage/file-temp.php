<?php
$archivo=("../grafica.txt")or die ("No se puede abrir el archivo");
$filas=file($archivo);
$penult=$filas[count($filas)-2];

echo $penult.'º';


?>
