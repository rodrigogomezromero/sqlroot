<?php
//Solicita el archivo requerido
require('ExtClsExtract.php');

#Crear objeto
$extSQL = new Extrayendo();

#Titulo
echo '<h2>Usuarios al momento</h2><br>';
echo "<a href='formulSQL.html'>Insertar Nuevo</a><br><br>";

#Publica las consultas
while($row = $extSQL->Extracto()){
	echo $row['nombre'].'<br>';
	echo $row['edad'].'<br>';
	#Transforma fecha Y-m-d a d/m/Y
	$fecha = $extSQL->FormatFecha($row['fecha_registro']);
	echo $fecha.'<br><br>';
}
#Cierra la tabla
$extSQL->Cerrar();




?>