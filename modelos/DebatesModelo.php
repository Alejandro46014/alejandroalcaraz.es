<?php

require_once("ConectarModelo.php");
require_once("controladores/EnlacesControlador.php");

class DebatesModelo{
	
	private $id_debate,$titulo_debate,$imagen_debate,$entradas_debate;
	
	public function DebatesModelo(){
		
		
	}
	
	public function setIdDebate($id_debate){
		
		$this->id_debate=$id_debate;
	}
	
	public function setTituloDebate($titulo_debate){
		
		$this->titulo_debate=$titulo_debate;
	}
	
	public function setImagenDebate($imagen_debate){
		
		$this->imagen_debate=$imagen_debate;
	}
	
	public function setEntradasDebate($entradas_debate){
		
		$this->entradas_debate=$entradas_debate;
	}
	
	#=======================GETTERS=================
	
	public function getIdDebate(){
		
		return $this->id_debate;
	}
	
	public function getTituloDebate(){
		
		return $this->titulo_debate;
	}
	
	public function getImagenDebate(){
		
		return $this->imagen_debate;
	}
	
	public function getEntradasDebate(){
		
		return $this->entradas_debate;
	}
	
	
	#=========================getById========================
	
	public function getById($id){
		
		
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM debates WHERE id_debate=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$consulta->execute();
			
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
			
			
				
				$debate=new DebatesModelo();
				
				$debate->id_debate=$resultado['id_debate'];
				$debate->titulo_debate=$resultado['titulo_debate'];
				$debate->imagen_debate=$resultado['imagen_debate'];
				
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($debate);
	}
	
	#=========================getTodo========================
	
	public function getTodo(){
		
		$lista_debates=[];
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM debates ORDER BY id_debate DESC";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->execute();
			
			$resultado=$consulta->fetchAll();
			
			foreach($resultado as $fila){
				
				$debate=new DebatesModelo();
				
				$debate->id_debate=$fila['id_debate'];
				$debate->titulo_debate=$fila['titulo_debate'];
				$debate->imagen_debate=$fila['imagen_debate'];
				
				$lista_debates[]=$debate;
				
			}
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($lista_debates);
	}
	
	
	
	#=====================Nuevo debate=========================
	
	public function nuevoDebate(){
		
		$titulo=$this->titulo_debate;
		$imagen=$this->imagen_debate;
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="INSERT INTO debates (titulo_debate,imagen_debate) VALUES (:titulo,:imagen)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':titulo',$titulo,PDO::PARAM_STR);
			$consulta->bindParam(':imagen',$imagen,PDO::PARAM_STR);
			
			
			$resultado=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($resultado);
	}
}