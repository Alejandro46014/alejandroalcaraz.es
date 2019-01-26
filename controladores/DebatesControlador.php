<?php
require_once("librerias/libreria.php");

class DebatesControlador{
	
	public function DebatesControlador(){
		
	}
	
	public function listarDebates(){
		
		$uso=new DebatesModelo();
		
		$debates=$uso->getTodo();
		
		require_once("plantillas/debates.php");
	}
	
	public function crearDebate(){
		
		if(isset($_POST['titulo_debate']) && isset($_POST['crear_debate'])){
			
			$titulo=$_POST['titulo_debate'];
			$imagen=subir_imagen();
			
			$uso=new DebatesModelo();
			
			$uso->setTituloDebate($titulo);
			$uso->setImagenDebate($imagen);
			
			$respuesta=$uso->nuevoDebate();
			
			if($respuesta){
				
				echo '<script type="text/javascript">
				alert("El espacio de debate se creo correctamente);
				</script>';
				
				$controller=new DebatesControlador();
				$controller->listarDebates();
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El espacio de debate no se pudo crear);
				</script>';
				
				$controller=new DebatesControlador();
				$controller->listarDebates();
			}
			
		}else{
			
			$controller=new DebatesControlador();
			$controller->listarDebates();
		}
	}
	
	public function entrarDebate(){
		
		require_once("modelos/EntradasModelo.php");
		
		if(isset($_GET['id'])){
			
			$id=$_GET['id'];
			
			$uso=new EntradasModelo();
			
			$entradas=$uso->getTodo($id);
			
			$uso=new DebatesModelo();
			
			$debate=$uso->getById($id);
			
			$debate->setEntradasDebate($entradas);
			
			
			
			require_once("plantillas/debateVista.php");
		}
	}
	
	
	
	
}