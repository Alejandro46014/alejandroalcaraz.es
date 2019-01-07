<?php
require_once("modelos/TiposUsuariosModelo.php");

class UsuariosControlador{
	
	public function crearUsuario(){
		
		if(isset($_GET['action'])){
			
			if(isset($_POST['nombre_usuario'])){
				
				$mal=false;
				$mal2=false;
				$mal3=false;
				
				$nombre=$_POST['nombre_usuario'];
				$password=$_POST['password_usuario'];
				$email=$_POST['email_usuario'];
				
				$tipo_usuario=new TiposUsuariosModelo();
				$patron="/^[a-zA-Z0-9]$/";
				if(empty($nombre) || empty($password) || empty($email)){
					
					echo '<script type="text/javascript">
				alert("Todos los campos son obligatorios");
				</script>';
					
					$mal=true;
					
				}
				
				if(!preg_match($patron,$nombre)){
					
					echo '<script type="text/javascript">
				alert("El campo nombre no puede contener simbolos ni caracteres especiales");
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
				
				if($mal || $mal2 || $mal3){
					
					echo '<script type="text/javascript">
				alert("Revise los campos e intentelo de nuevo");
				</script>';
					
					header("location:?controller=Enlaces&action=navegacionPaginas&pagina=registro");
					
				}else{
					
					$usuario=new UsuariosModelo();
					$usuario->setNombreUsuario($nombre);
					$usuario->setEmailUsuario($email);
					$usuario->setPasswordUsuario($password);
					$usuario->setTipoUsuario($tipo_usuario);
					
					$resultado=$usuario->guardar();
					
					if($resultado){
						
						header("location:?controller=Enlaces&action=navegacionPaginas&pagina=login");
						
					}else{
						
						echo '<script type="text/javascript">
				alert("Revise los campos e intentelo de nuevo");
				</script>';
						
						header("location:?controller=Enlaces&action=navegacionPaginas&pagina=registro");
					}
				}
			}
		}
	}
	
	
	#==================LOGUEARSE========================#
	
	public function loguearse(){
		
		if(isset($_GET['action'])){
			
			if(isset($_POST['email_usuario'])){
				
				$datosControlador=array('email_usuario'=>$_POST['email_usuario'],
										'password_usuario'=>$_POST['password_usuario']
				);
				
				$usuario=new UsuariosModelo();
				
				$respuesta=$usuario->login($datosControlador);
				
				if($respuesta){
					
					header("location:?controller=Enlaces&action=navegacionPaginas&pagina=index");
				}
			}
		}
	}
}

