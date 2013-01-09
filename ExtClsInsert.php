<?php

require('ClsRootSQL.php');

/*
* Clase extendida para insertar datos de MYSQL
*/

class InsertInto extends RootSQL
{
	

	//Crea la conexion a la base de datos
	function __construct()
	{
		parent::__construct();
	}

	#Construye la consulta SQL y la inserta en la tabla
	function Insertando($nombre, $edad){
		$fecha = date('Y-m-d');
		$SQL = "INSERT INTO alumnos (nombre, edad, fecha_registro) values ('$nombre', '$edad', '$fecha')";
		parent::Consult($SQL);
	}

	function Cerrar(){
		parent::Close();
	}

}

?>