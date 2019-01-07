<?php
require_once("ConectarModelo.php");

class UsuariosModelo{
	
	protected $id,$nombre,$email,$password,$tipo_usuario;
	
	public function __construct(){
		
		
	}
	
	#===================SETTERS==========================#
	
	public function setIdUsuario($id){
		
		$this->id=$id;
	}
	
	public function setNombreUsuario($nombre){
		
		$this->nombre=$nombre;
	}
	
	public function setEmailUsuario($email){
		
		$this->email=$email;
	}
	
	public function setPasswordUsuario($password){
		
		$this->password=$password;
	}
	
	public function setTipodUsuario($tipo_usuario){
		
		$this->tipo_usuario=$tipo_usuario;
	}
	
	
	
	#===================GETTERS=========================#
	
	public function getIdUsuario(){
		
		return($this->id);
	}
	
	public function getNombreUsuario(){
		
		return($this->nombre);
	}
	
	public function getEmailUsuario(){
		
		return($this->email);
	}
	
	public function getPasswordUsuario(){
		
		return($this->password);
	}
	
	public function getTipoUsuario(){
		
		return($this->tipo_usuario);
	}
	
	#===================getById========================#
	
	public function getById($id){
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM usuarios WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_STR);
			
			$consulta->execute();
			
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
			
			$usuario=new UsuariosModelo();
			$usuario->id=$resultado['id_usuario'];
			$usuario->nombre=$resultado['nombre_usuario'];
			$usuario->password=$resultado['password_usuario'];
			$usuario->email=$resultado['email_usuario'];
			$usuario->tipo_usuario=new TiposUsuariosModelo($resultado['tipos_usuarios_id_tipo_usuario']);
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($usuario);
	}
	
	#===================getTodo========================#
	
	public function getTodo(){
		
		try{
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
	}
	
	#===================guardar========================#
	
	public function guardar(){
		
		$nombre=$this->nombre;
		$email=$this->email;
		$password=$this->password;
		$tipo_usuario=$this->tipo_usuario->getIdTipoUsuario();
		
		try{
			
			$conexion=Conectar::conexion();
			$sql="SELECT * FROM usuarios WHERE email_usuario=:email";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			
			$consulta->execute();
			
			$num_filas=$consul->rowCount();
			
			$consulta->closeCursor();
			
			if($num_filas==0){
				
				$sql="INSERT INTO usuarios (nombre_usuario,email_usuario.password_usuario,tipos_usuarios_id_tipo_usuario) VALUES (:nombre,:email,:password,:tipo_usuario)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':nombre',$password,PDO::PARAM_STR);
			$consulta->bindParam(':nombre',$tipo_usuario,PDO::PARAM_INT);
			
			$resultado=$consulta->execute();
				
			$consulta->closeCursor();
			
			}else{
			
				echo '<script type="text/javascript">
				alert("Ya existe un usuario con esas credenciales,por favor inicie sesión");
				</script>';

			header("location:?controller=Enlaces&action=navegacionPaginas&pagina=login");
				
			}
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		$conexion=null;
		
		return($resultado);
	}
	
	#===================login========================#
	
	public function login($datos){
		
		$email=$datos['email'];
		$password=$datos['password'];
		
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM usuarios WHERE email_usuario=:email AND password_usuario=:password";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			
			$consulta->execute();
			
			$array=$consulta->fetch(PDO::FETCH_ASSOC);
			
			$num_filas=$consulta->rowCount();
			
			if($num_filas==0){
				
				echo '<script type="text/javascript">
				alert("No existe ningún usuario '.$email.' o esta '.$password.' no es su contraseña, 
				revise los campos e intentelo de nuevo");
				</script>';
				
			}elseif($num_filas==1){
				
				session_start();
				$_SESSION['login']=true;
				$_SESSION['id']=$array['id_usuario'];
			}
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
	}
	
	
}

