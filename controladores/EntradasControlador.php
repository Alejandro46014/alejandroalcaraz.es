<?php

require_once("controladores/DebatesControlador.php");

class EntradasControlador{
	
	public function EntradasControlador(){
		
	}
	
	public function nuevaEntrada(){
		
		if(isset($_GET['id'])){
			
			$id_debate=$_GET['id'];
			$id_usuario=$_POST['id_usuario'];
			$comentario=$_POST['comentario_entrada'];
			$fecha= date("Y-m-d H:i:s");
			
			$entrada= new EntradasModelo();
			
			$entrada->setIdDebate($id_debate);
			$entrada->setIdUsuario($id_usuario);
			$entrada->setComentarioEntrada($comentario);
			$entrada->setFechaEntrada($fecha);
			
			$respuesta=$entrada->nuevaEntrada();
			
			if($respuesta){
	
				echo '<script type="text/javascript">
				alert("Muchas gracias por tu comentario");
				</script>';
				
				$controller=new DebatesControlador();
			
			$_GET['id']=$id_debate;
			
			$controller->entrarDebate();
				
			}else{
				
				echo '<script type="text/javascript">
				alert("No comentario");
				</script>';
				
				$controller=new DebatesControlador();
			
			$_GET['id']=$id_debate;
			
			$controller->entrarDebate();
				
			}
			
			
			
			
		}
	}
}