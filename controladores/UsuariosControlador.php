<?php
require_once("modelos/TiposUsuariosModelo.php");
require_once("EnlacesControlador.php");

class UsuariosControlador{
	
	public function crearUsuario(){
		
		if(isset($_GET['action'])){
			
			
				
				$mal=false;
				$mal2=false;
				$mal3=false;
				$mal4=false;
				
				$nombre=$_POST['nombre_usuario'];
				$password=$_POST['password_usuario'];
				$rpassword=$_POST['rpassword_usuario'];
				$email=$_POST['email_usuario'];
				
				
				$patron="/[a-zA-Z0-9]/";
				
				
				if(empty($nombre) || empty($password) || empty($email)){
					
					echo '<script type="text/javascript">
				alert("Todos los campos son obligatorios");
				</script>';
					
					$mal=true;
					
				}
				
				if(!preg_match($patron,$nombre)){
					
					echo '<script type="text/javascript">
				alert("El campo nombre no puede contener caracteres especiales");
				</script>';
					
					$mal2=true;
					
				}
				
				$patron="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
				
				if(!preg_match($patron,$password)){
					
					echo '<script type="text/javascript">
				alert("La contraseña debe contener minúsculas, mayúsculas y digitos");
				</script>';
					
					$mal3=true;
					
				}
				
				if($password != $rpassword){
					
					echo '<script type="text/javascript">
				alert("Las contraseñas no coinciden");
				</script>';
					
					$mal4=true;
				}
				
				if($mal || $mal2 || $mal3 || $mal4){
					
					echo '<script type="text/javascript">
				alert("Revise los campos e intentelo de nuevo");
				</script>';
					
					$controller=new EnlacesControlador();
					$_GET['pagina']="registro";
					$controller->navegacionPaginas();
					
					
				}else{
					
					$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					$usuario=new UsuariosModelo();
					$usuario->setNombreUsuario($nombre);
					$usuario->setEmailUsuario($email);
					$usuario->setPasswordUsuario($encriptar);
					$tipo_usuario=new TiposUsuariosModelo();
					$usuario->setTipoUsuario($tipo_usuario);
					
					$resultado=$usuario->guardar();
					
					if($resultado){
						
						$controller=new EnlacesControlador();
					$_GET['pagina']="login";
					$controller->navegacionPaginas();
						
					}else{
						
						echo '<script type="text/javascript">
				alert("Revise los campos e intentelo de nuevo");
				</script>';
						
						$controller=new EnlacesControlador();
					$_GET['pagina']="registro";
					$controller->navegacionPaginas();
					}
				}
			
		}
	}
	
	
	#==================LOGUEARSE========================#
	
	public function loguearse(){
		
		if(isset($_GET['action'])){
			
			if(isset($_POST['email_usuario'])){
				
				$encriptar=crypt($_POST['password_usuario'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$datosControlador=array('email_usuario'=>$_POST['email_usuario'],
										'password_usuario'=>$encriptar
				);
				
				$usuario=new UsuariosModelo();
				
				$respuesta=$usuario->login($datosControlador);
				
				if($respuesta){
					
					
					
					echo '<script type="text/javascript">
						window.location.assign("index.php");
						</script>';
					
					$controller=new EnlacesControlador();
					$_GET['pagina']="presentacion";
					$controller->navegacionPaginas();
				}else{
					
					$controller=new EnlacesControlador();
					$_GET['pagina']="login";
					$controller->navegacionPaginas();
				}
			}else{
				
				echo '<script type="text/javascript">
				alert("Debe rellenar los campos");
				</script>';
						
						$controller=new EnlacesControlador();
					$_GET['pagina']="login";
					$controller->navegacionPaginas();
				
			}
		}
	}
	
	
	#========================ACTUALIZAR USUARIO=======================
	
	public function actualizarUsuario(){
		
		if(isset($_GET['id'])){
			
		$id=$_GET['id'];
		$nombre=$_POST['nombre_usuario'];
		$email=$_POST['email_usuario'];
			
		$patron="/[a-zA-Z0-9]/";
			
			if(empty($nombre) || empty($email)){
				
				echo '<script type="text/javascript">
				alert("Debe rellenar los campos");
				</script>';
				
				$mal=true;
				
			}elseif(!preg_match($patron,$nombre)){
				
				echo '<script type="text/javascript">
				alert("El nombre no puede contener caracteres especiales");
				</script>';
				
				$mal2=true;
				
			}
			
			if($mal || $mal2){
				
				header("location:?controller=Enlaces&action=navegacionPaginas&pagina=modificarPerfil");
				
			}else{
				
				$user=new UsuarioModelo();
				
				$usuario=$user->getById($id);
				$usuario->setNombreUsuario($nombre);
				$usuario->setEmailUsuario($email);
				
				$respuesta=$usuario->actualizar();
				
		require_once("plantillas/modificarPerfil.php");
				
				
			}
			
			
		
	}
		
	}
	
	
	#========================ACTUALIZAR PASSWORD=======================
	
	
	public function actualizarPassword(){
		
		
		
	}
	
	#========================RESTABLECER PASSWORD======================
	
	
	public function restablrcerPassword(){
		
		
	}
	
	
}

