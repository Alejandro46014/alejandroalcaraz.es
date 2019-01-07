<?php
require_once 'modelos/UsuariosModelo.php';
require_once('modelos/ConectarModelo.php');
                session_start();
                if(!isset($_SESSION['login'])){
                    
                    $_SESSION['login']=FALSE;
                    $_SESSION['usuario']="";
                }else{
					
					require_once 'modelos/UsuariosModelo.php';
					
                $id=$_SESSION['usuario'];
                $usuarioAc= new UsuariosModelo();
                $usuario=$usuarioAc->getById($id);
                }





	// la variable controller guarda el nombre del controlador y action guarda la acción por ejemplo registrar 

	//si la variable controller y action son pasadas por la url desde layout.php entran en el if

	if (isset($_GET['controller'])&&isset($_GET['action'])) {
           
		$controller=$_GET['controller'];

		$action=$_GET['action'];		

	} else{
            
            if($_SESSION['login']==TRUE && $usuario->getTipoUsuario()->getTipoUsuario()=="Administrador"){
                
                
                    
                    $controller="Administrador";
                    $action="index";
				
                }else{
                    
                   
                    $controller="Enlaces";
                    $action="navegacionPaginas";
                }
           
        }
         
            

         include_once("plantillas/includes/header.php");    
        
       
      //session_start();
     //session_destroy();
      //se comprueba si existe alguna sesión o no, entonces se muestra menu de registro o menu del usuario
        if(isset($_SESSION['login']) && $_SESSION['login']==true){
			
           if($usuario->getTipoUsuario()->getTipoUsuario()=="Administrador")
            $usuario=$usuario->getById($id);
            
          require_once 'plantillas/includes/navegacion_administrador.php';
          
        }elseif(isset($_SESSION['login']) && $_SESSION['login']){
           
            $usuario=$usuario->getById($id);
			
            require_once 'plantillas/includes/navegacion_usuarios.php';
            
        }else{
             echo $usuario->getIdUsuario();
			
          require_once 'plantillas/includes/navegacion_invitados.php';
        }
        
        
	
?>







<?php  include_once("plantillas/includes/footer.php"); ?>