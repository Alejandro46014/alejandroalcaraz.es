<?php

class EnlacesControlador{
	
	public function navegacionPaginas(){
		
		if(isset($_GET['pagina'])){
			
			$pagina=$_GET['pagina'];
			
			if($pagina=="index"){
				
				require_once("plantillas/presentacion.php");
				
			}elseif($pagina=="galeria"){
				
				require_once("plantillas/galeria.php");
				
			}elseif($pagina=="registro"){
				
				require_once("plantillas/registro.php");
				
			}elseif($pagina=="login"){
				
				require_once("plantillas/login.php");
				
			}else{
				
				require_once("plantillas/presentacion.php");
				
			}
		}
	}
}