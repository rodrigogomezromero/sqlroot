<?php

#Verifica eistencia de post
if(@$_POST['nombre'] && @$_POST['edad']){
require('ExtClsInsert.php');

#Crear objeto
$inSQL = new InsertInto();

#Insertar datos en la tabla segun lo enviado
$inserta = $inSQL->Insertando($_POST['nombre'], $_POST['edad']);
echo "El usuario ".$_POST['nombre']." ha sido insertado con exito"."<br/>";
$inSQL->Cerrar();
}

#CAso de no obtener post enviar error
else{
	echo 'No se ha insertado nada';
}

#Boton para ver usuarios
echo "<a href='pruebamodulo.php'>Ver usuarios</a>";
?>