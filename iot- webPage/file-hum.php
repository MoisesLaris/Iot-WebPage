
<?php
$archivo=("../grafica.txt")or die ("No se puede abrir el archivo");
$filas=file($archivo);
$ult=$filas[count($filas)-1];

echo $ult;


?>
