<?php
require_once("modelos/DebatesModelo.php");
require_once("ConectarModelo.php");
require_once("controladores/EnlacesControlador.php");


class EntradasModelo{
	
	private $id_entrada,$id_debate,$id_usuario,
	$comentario_entrada,$fecha_entrada;
	
	public function EntradasModelo(){
		
		
	}
	
	public function setIdEntrada($id_entrada){
		
		$this->id_entrada=$id_entrada;
	}
	
	
	public function setIdDebate($id_debate){
		
		$this->id_debate=$id_debate;
	}
	
	
	public function setIdUsuario($id_usuario){
		
		$this->id_usuario=$id_usuario;
	}
	
	
	public function setComentarioEntrada($comentario_entrada){
		
		$this->comentario_entrada=$comentario_entrada;
	}
	
	
	public function setFechaEntrada($fecha_entrada){
		
		$this->fecha_entrada=$fecha_entrada;
	}
	
	#=====================GETTERS==============================
	
	public function getIdEntrada(){
		
		return $this->id_entrada;
	}
	
	
	public function getIdDebate(){
		
		return $this->id_debate;
	}
	
	
	public function getIdUsuario(){
		
		return $this->id_usuario;
	}
	
	
	public function getComentarioEntrada(){
		
		return $this->comentario_entrada;
	}
	
	
	public function getFechaEntrada(){
		
		return $this->fecha_entrada;
	}
	
	#=========================getTodo el debate=======================
	
	public function getTodo($id_debate){
		
		$lista_entradas=[];
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM entradas WHERE debates_id_debate=:id_debate ORDER BY id_entrada DESC LIMIT 25";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id_debate',$id_debate,PDO::PARAM_INT);
			
			$consulta->execute();
			
			$resultado=$consulta->fetchAll();
			
			foreach($resultado as $fila){
				
				$entrada=new EntradasModelo();
				
				$entrada->id_entrada=$fila['id_debate'];
				$entrada->id_debate=$fila['debates_id_debate'];
				$entrada->id_usuario=$fila['usuarios_id_usuarios'];
				$entrada->comentario_entrada=$fila['comentario_entrada'];
				$entrada->fecha_entrada=$fila['fecha_entrada'];
				
				$lista_entradas[]=$entrada;
				
			}
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($lista_entradas);
	}
	
	public function nuevaEntrada(){
		
		$id_usuario=$this->id_usuario;
		$id_debate=$this->id_debate;
		$comentario_entrada=$this->comentario_entrada;
		$fecha_entrada=$this->fecha_entrada;
	
	
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="INSERT INTO entradas (debates_id_debate,usuarios_id_usuarios,comentario_entrada,fecha_entrada) VALUES (:id_debate,:id_usuario,:comentario,:fecha)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id_debate',$id_debate,PDO::PARAM_INT);
			$consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
			$consulta->bindParam(':comentario',$comentario_entrada,PDO::PARAM_STR);
			$consulta->bindParam(':fecha',$fecha_entrada,PDO::PARAM_STR);
			
			$respuesta=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($respuesta);
	}
	
}