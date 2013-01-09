<?php

require('ClsRootSQL.php');

/**
* Extension de Sistema que trabajara en el programa
*/
final class db extends RootSQL
{

	//Variables para personalizar la consulta
	private $SQL ;
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
	/*
	* Metodo  que se encarga de retornar Todos los datos 
	*	Este Metodo recibe dos argumentos la tabla  que va a extraer todos los registros y
	*	una cadena de texto que contiene los campos que se quiere retornar separados por comas
	*	Ejemplo $tabla= alumnos $campos = "id,nombre,apellidos,telefono"
	*	En caso de que quiera todos los campos mandar el caracter * a la variable campos
	*/
	 function findAll($tabla,$campos){
			$SQL ="SELECT $campos FROM $tabla";
			$result = parent::$this->Consult($SQL);
			return $result;
	}

	/*
	*
	*Metodo  que se encarga de actualizar registros de la base de datos 
	*	recibe Tres parámetros el primero es la tabla , el segundo es los campos que quieres actualizar con el valor del campo 
		y por último el identificador del registro que se quiere actualizar
		por ejemplo
		$table =`zan_fotografos` 
		$campos= `username` = 'rodrigo' 
		$id = `id`=3;
	* 	
	*/
	 function update($table,$campos,$id){
		$SQL = "UPDATE $table SET $campos WHERE $valores";
		$result = parent::$this->Consult($SQL);
		return $result;

	}

	/*
	*
	*	Metodo 	que se encarga de seleccionar a un regristro de la base de datos pasandole como
	*	parametros la tabla y el campo que selecciona y in identificador unico que  tiene que buscar por ejemplo:
	* 	ejempo :   findBy ('usuarios', "nombre,correo,telefono", nombre= "rodrigo");
	*
	*/
	function findBy ($tabla , $campos,$id){
		$SQL = " SELECT $campos FROM $tabla  WHERE $id";
		$result = parent::Consult($SQL);
		return $result;


	}

	/*
*	Metodo que se encarga  de insertar datos a la base de datos recibe como parametros el nombre de la tabla
* 	los campos de la tabla y por ultimo los valores que se insertaran  por ejemplo:
*	$table = "usuarios";
*	$campos= "`id` ,`username` ,`name` ,`email` ,`phone`";
*	$valores = NULL , 'rodrigogomez', 'rodrigogomez', 'rodrigog@mirrorwebhost.com', '1254558';
*/
 function insert ($table,$campos,$valores){
	$SQL = " INSERT INTO $table($campos) VALUES ($valores)";
	$result = parent::$this->Consult($SQL);
	return $result;
}



	#Cierra la consulta
	function Cerrar(){
		parent::Close();
	}

}

?>