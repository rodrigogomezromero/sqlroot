<?php

/**
* Clase padre que permitira la conexion de base de datos con las consultas
* necesarias
*/


class RootSQL
{
	private $link;
	private $servidor = 'localhost';
	private $usuario = 'root';
	private $pwd = '';
	private $BD = 'miguel_test';
	private $consulta;
	
	//Constructivo, crea la conexión y crea la consulta SQL
	protected function __construct()
	{
		$this->link=mysql_connect($this->servidor,$this->usuario,$this->pwd);
		mysql_select_db($this->BD,$this->link);
		

	}


	//Crea la consulta totalmente personalizada
	protected function Consult($SQL)
	{
		$this->consulta = mysql_query($SQL, $this->link);
		return ($this->consulta);
	}


		

	//Metodo para devolver el valor la consulta del SQL seleccion
	protected function ExtraFilas($consultaSQL){
		
		$extraccion = mysql_fetch_assoc($consultaSQL);
		return ($extraccion);

	}

	//Metodo que termina la consulta SQL
	protected function Close()
	{
		mysql_close($this->link);
	}

	variant_fix(variant)


}// FIN DE LA CLASE


?>





