<?php

class Conectar{
	
	public static function conexion(){
		
		$conexion= new PDO("mysql:host=localhost;dbname=alejandroalcaraz.es","Alejandro","3424");
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conexion->exec("set names utf8");
		
		return($conexion);
	}
}