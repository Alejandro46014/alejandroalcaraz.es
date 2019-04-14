<?php

class Conectar{
	
	public static function conexion(){
		
<<<<<<< HEAD
		$conexion= new PDO("mysql:host=localhost:3306;dbname=alejandroalcaraz.es","Alejandro","3424");
=======
		$conexion= new PDO("mysql:host=localhost;dbname=alejandroalcaraz.es","alejandro","3424");
>>>>>>> origin/master
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conexion->exec("set names utf8");
		
		return($conexion);
	}
}