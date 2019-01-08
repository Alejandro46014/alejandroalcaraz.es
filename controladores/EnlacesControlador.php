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
				
			}elseif($pagina=="modificarPerfil"){
				
				require_once("plantillas/modificarperfil.php");
				
			}elseif($pagina=="login"){
				
				require_once("plantillas/login.php");
				
			}elseif($pagina=="cerrarSesion"){
				
				session_start();
				$_SESSION['login']=false;
				$_SESSION['usuario']="";
				session_destroy();
				
				echo '<script type="text/javascript">
						window.location.assign("index.php");
						</script>';
				
				require_once("plantillas/presentacion.php");
				
			}else{
				
				require_once("plantillas/presentacion.php");
				
			}
		}
	}
}