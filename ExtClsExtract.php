<?php

require('ClsRootSQL.php');

/**
* Extension de Sistema que trabajara en el programa
*/
class Extrayendo extends RootSQL
{

	//Variables para personalizar la consulta
	private $SQL = 'SELECT*FROM alumnos';
	private $consulta;	
	
	#Funcion constructora que toma la constructora de la padre y
	#la funcion de consulta tomando el SQL personalizado
	function __construct()
	{
		parent::__construct();
		$this->consulta = parent::Consult($this->SQL);
	}

	#Crea el fetch assoc de la tabla con la consulta SQL
	function Extracto(){
		$obj = parent::ExtraFilas($this->consulta);
		return $obj;
		
	}

	#Convierte la fecha de Y-m-d a d/m/Y
	function FormatFecha($fecha){
		$arreglo = preg_split("/-/", $fecha);
		$nuevo = $arreglo[2].'/'.$arreglo[1].'/'.$arreglo[0];
		return ($nuevo);
	}



	#Cierra la consulta
	function Cerrar(){
		parent::Close();
	}
 	




}
 ?>