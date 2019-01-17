<?php
require_once("modelos/TiposUsuariosModelo.php");
require_once("EnlacesControlador.php");
require_once("librerias/libreria.php");

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
	
	
	#========================MODIFICAR USUARIO=======================
	
	public function modificarPerfil(){
		echo("aqui");
		if(isset($_GET['id'])){
			
			$id=$_GET['id'];
			
			$user=new UsuariosModelo();
			
			$usuario=$user->getById($id);
			
			require_once("plantillas/modificarperfil.php");
		}
	}
	
	
	#========================ACTUALIZAR USUARIO=======================
	
	public function actualizarUsuario(){
		
		if(isset($_GET['id'])){
			
		$id=$_GET['id'];
		$nombre=$_POST['nombre_usuario'];
		$email=$_POST['email_usuario'];
			
			$mal=false;
			$mal2=false;
			
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
				
				$_GET['id']=$id;
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
				
			}else{
				
				$user=new UsuariosModelo();
				
				$usuario=$user->getById($id);
				$usuario->setNombreUsuario($nombre);
				$usuario->setEmailUsuario($email);
				
				$respuesta=$usuario->actualizar();
				
				if($respuesta){
				
					echo '<script type="text/javascript">
				alert("Los datos se actualizaron correctamente");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
				
				}else{
					
					echo '<script type="text/javascript">
				alert("Los datos no se pudieron modificar");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
				}
				
				
			}
			
			
		
	}
		
	}
	
	
	#========================ACTUALIZAR PASSWORD=======================
	
	
	public function actualizarPassword(){
		
		if(isset($_GET['id'])){
			
			
			$id=$_GET['id'];
			$password=$_POST['password_usuario'];
			$rpassword=$_POST['rpassword_usuario'];
			$patron="/[a-zA-Z0-9]/";
			
			$mal=false;
			$mal2=false;
			$mal3=false;
			
			$user=new UsuariosModelo();
			
			if(empty($password) || empty($rpassword)){
				
				echo '<script type="text/javascript">
				alert("Debe rellenar los campos");
				</script>';
				
				$mal=true;
			}
			
			if(!preg_match($patron,$password)){
				
				echo '<script type="text/javascript">
				alert("La contraseña no puede contener caracteres especiales");
				</script>';
				
				$mal2=true;
				
			}
			
			if($password != $rpassword){
				
				echo '<script type="text/javascript">
				alert("Las contraseñas no coinciden");
				</script>';
				
				$mal3=true;
			}
			
			if($mal || $mal2 || $mal3){
				
				$_GET['id']=$id;
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
				
			}else{
				
				$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				
				$usuario=$user->getById($id);
				$usuario->setPasswordUsuario($encriptar);
				
				$respuesta=$usuario->actualizarPassword();
				
				
				if($respuesta){
					
						echo '<script type="text/javascript">
				alert("La contraseña se actualizó correctamente");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
					
				}else{
					
						echo '<script type="text/javascript">
				alert("La contraseña no se pudo actualizar");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
					
				}
			}
		}
		
	}
	
	
	#========================RESTABLECER PASSWORD======================
	
	
	public function restablecerPassword(){
		
		if(isset($_POST['reset'])){
			
		$email=$_POST['email_usuario'];
		$password=$_POST['password_usuario'];
			$rpassword=$_POST['rpassword_usuario'];
			$patron="/[a-zA-Z0-9]/";
			
			$mal=false;
			$mal2=false;
			$mal3=false;
			
			
			$user=new UsuariosModelo();
			
			if(empty($password) || empty($rpassword) || empty($email)){
				
				echo '<script type="text/javascript">
				alert("Debe rellenar los campos");
				</script>';
				
				$mal=true;
			}
			
			if(!preg_match($patron,$password)){
				
				echo '<script type="text/javascript">
				alert("La contraseña no puede contener caracteres especiales");
				</script>';
				
				$mal2=true;
				
			}
			
			if($password != $rpassword){
				
				echo '<script type="text/javascript">
				alert("Las contraseñas no coinciden");
				</script>';
				
				$mal3=true;
			}
			
			if($mal || $mal2 || $mal3){
				
				$_GET['pagina']="restablecerPassword";
				$controller=new EnlacesControlador();
				
				$controller->navegacionPaginas();
				
			}else{
				
				
				$encriptar=crypt($password,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				
				$usuario=$user->getById($id);
				$usuario->setPasswordUsuario($encriptar);
				$usuario->setEmailUsuario($email);
				
				$respuesta=$usuario->restablecerPassword();
				
				
				if($respuesta){
					
						echo '<script type="text/javascript">
				alert("La contraseña se actualizó correctamente");
				</script>';
					
				$_GET['pagina']="index";
				
				$controller=new EnlacesControlador();
				
				$controller->navegacionPaginas();
					
				}elseif(!$respuesta){
					
						echo '<script type="text/javascript">
				alert("No existe ningun usuario con ese correo electrónico");
				</script>';
					
				$_GET['pagina']="restablecerPassword";
				
				$controller=new EnlacesControlador();
				
				$controller->navegacionPaginas();
					
				}elseif($respuesta=="Error"){
					
						echo '<script type="text/javascript">
				alert("Por favor contacte con el administrador");
				</script>';
					
					$_GET['pagina']="index";
				
				$controller=new EnlacesControlador();
				
				$controller->navegacionPaginas();
					
				}
			}
				
		}
			
	}

	#=======================AMPLIARPERFIL=====================
	
	public function ampliarPerfil(){
		
		if(isset($_GET['id'])){
			
			$id=$_GET['id'];
			$ciudad=$_POST['ciudad_usuario'];
			$pais=$_POST['pais_usuario'];
			$poblacion=$_POST['poblacion_usuario'];
			$descripcion=$_POST['descripcion_usuario'];
			$patron="/[a-zA-Z]/";
			
			$mal=false;
			$mal2=false;
			$mal3=false;
			
			if(empty($ciudad) && empty($poblacion) && empty($pais) && empty($_FILES['archivo'])){
				
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
				
			}
			
			if(isset($_POST['archivo'])){//imagen
				
				$imagen=subir_archivos();
				
			}else{
				
				$imagen="";
				
			}//imagen
			
			//pais
			
			if($pais != ""){
				
				if(!preg_match($patron,$pais)){
					
					echo '<script type="text/javascript">
				alert("No introduzca caracteres especiales);
				</script>';
					
					$mal=true;
					
				}
			}//pais
			
			//ciudad
			
			if($ciudad != ""){
				
				if(!preg_match($patron,$ciudad)){
					
					echo '<script type="text/javascript">
				alert("No introduzca caracteres especiales);
				</script>';
					
					$mal2=true;
					
				}
			}//ciudad
			
			//población
			
			if($poblacion != ""){
				
				if(!preg_match($patron,$poblacion)){
					
					echo '<script type="text/javascript">
				alert("No introduzca caracteres especiales);
				</script>';
					
					$mal3=true;
					
				}
			}//población
			
			if($mal || $mal2 || $mal3){
				
					echo '<script type="text/javascript">
				alert("Compruebe los campos e intentelo de nuevo);
				</script>';
				
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
			}else{
				
				$usuario=new UsuariosModelo();
				
				$usuario->setIdUsuario($id);
				$usuario->setPaisUsuario($pais);
				$usuario->setCiudadUsuario($ciudad);
				$usuario->setPoblacionUsuario($poblacion);
				$usuario->setDescripcionUsuario($descripcion);
			    $usuario->setImagenUsuario($imagen);
				
				$respuesta=$usuario->ampliar();
				
				if($respuesta){
					
					echo '<script type="text/javascript">
				alert("Sus datos se actualizaron");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
					
				}else{
					
					echo '<script type="text/javascript">
				alert("Sus datos no se pudieron actualizar, contacte con el administrador");
				</script>';
					
				$_GET['id']=$id;
				
				$controller=new UsuariosControlador();
				
				$controller->modificarPerfil();
					
				}
				
			}
			
		}
	}
}



