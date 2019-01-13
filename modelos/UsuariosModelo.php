<?php
require_once("ConectarModelo.php");
require_once("TiposUsuariosModelo.php");
require_once("controladores/EnlacesControlador.php");

class UsuariosModelo{
	
	protected $id,$nombre,$email,$password,$tipo_usuario,$pais_usuario,$ciudad_usuario,$poblacion_usuario,$descripcion_usuario,$imagen_usuario,$ampliado_usuario;
	
	public function UsuariosModelo(){
		
		
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
	
	public function setTipoUsuario($tipo_usuario){
		
		$this->tipo_usuario=$tipo_usuario;
	}
	
	public function setPaisUsuario($pais){
		
		$this->pais_usuario=$pais;
	}
	
	public function setCiudadUsuario($ciudad){
		
		$this->ciudad_usuario=$ciudad;
	}
	
	public function setPoblacionUsuario($poblacion){
		
		$this->poblacion_usuario=$poblacion;
	}
	
	public function setDescripcionUsuario($descripcion){
		
		$this->descripcion_usuario=$descripcion;
	}
	
	public function setImagenUsuario($imagen){
		
		$this->imagen_usuario=$imagen;
	}
	
	public function setAmpliadoUsuario($ampliado){
		
		$this->ampliado_usuario=$ampliado;
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
	
	public function getPaisUsuario(){
		
		return($this->pais_usuario);
	}
	
	public function getCiudadUsuario(){
		
		return($this->ciudad_usuario);
	}
	
	public function getPoblacionUsuario(){
		
		return($this->poblacion_usuario);
	}
	
	public function getDescripcionUsuario(){
		
		return($this->descripcion_usuario);
	}
	
	public function getImagenUsuario(){
		
		return($this->imagen_usuario);
	}
	
	public function getAmpliadoUsuario(){
		
		return($this->ampliado_usuario);
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
			$usuario->pais_usuario=$resultado['pais_usuario'];
			$usuario->ciudad_usuario=$resultado['ciudad_usuario'];
			$usuario->poblacion_usuario=$resultado['poblacion_usuario'];
			$usuario->descripcion_usuario=$resultado['descripcion_usuario'];
			$usuario->imagen_usuario=$resultado['imagen_usuario'];
			
			$usuario->tipo_usuario=new TiposUsuariosModelo();
			
			if($resultado['pais_usuario'] != "NULL" || $resultado['ciudad_usuario'] != "NULL" || $resultado['poblacion_usuario'] != "NULL" || $resultado['descripcion_usuario'] != "NULL" || $resultado['imagen_usuario'] != "NULL"){
				
				$usuario->ampliado_usuario=true;
				
			}else{
				
				$usuario->ampliado_usuario=false;
				
			}
			
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
			
			$num_filas=$consulta->rowCount();
			
			$consulta->closeCursor();
			
			if($num_filas==0){
				
				$sql="INSERT INTO usuarios (tipos_usuarios_id_tipo_usuario,nombre_usuario,email_usuario, password_usuario) VALUES (:tipo_usuario,:nombre,:email,:password)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			$consulta->bindParam(':tipo_usuario',$tipo_usuario,PDO::PARAM_INT);
			
			if($consulta->execute()){
				
				$resultado=true;
			}
				
			$consulta->closeCursor();
			
			}else{
			
				echo '<script type="text/javascript">
				alert("Ya existe un usuario con esas credenciales,por favor inicie sesión");
				</script>';

				$controller=new EnlacesControlador();
				$_GET['pagina']="login";
				$controller->navegacionPaginas();
				
			}
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		$conexion=null;
		
		return($resultado);
	}
	
	#===================login========================#
	
	public function login($datos){
		
		$email=$datos['email_usuario'];
		$password=$datos['password_usuario'];
		
		
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
				
				$resultado=true;
			}
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($resultado);
	}
	
	#======================AMPLIAR USUARIO===========================
	
	
	public function ampliar(){
		
		$id=$this->id;
		$pais=$this->pais_usuario;
		$ciudad=$this->ciudad_usuario;
		$poblacion=$this->poblacion_usuario;
		$imagen=$this->imagen_usuario;
		$descripcion=$this->descripcion_usuario;
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="UPDATE usuarios SET pais_usuario=:pais, ciudad_usuario=:ciudad, poblacion_usuario=:poblacion, imagen_usuario=:imagen, descripcion_usuario=:descripcion WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			$consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
			$consulta->bindParam(':ciudad',$ciudad,PDO::PARAM_STR);
			$consulta->bindParam(':poblacion',$poblacion,PDO::PARAM_STR);
			$consulta->bindParam(':imagen',$imagen,PDO::PARAM_STR);
			$consulta->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
		
			
			$resultado=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($resultado);
		
	}
	
	
	#======================ACTUALIZAR USUARIO===========================
	
	public function actualizar(){
		
		$id=$this->id;
		$nombre=$this->nombre;
		$email=$this->email;
		
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="UPDATE usuarios SET nombre_usuario=:nombre, email_usuario=:email WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			
		
			
			$resultado=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($resultado);
		
	}
	
	#======================ACTUALIZAR CONTRASEÑA===========================
	
	public function actualizarPassword(){
		
		$id=$this->id;
		$password=$this->password;
		
		
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="UPDATE usuarios SET password_usuario=:password WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			
			
		
			
			$resultado=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		return($resultado);
		
	}
	
	
	public function restablecerPassword(){
		
		$email=$this->email;
		$password=$this->password;
		
		
		
		try{
			
			$conexion=Conectar::conexion();
			
			$sql="SELECT * FROM usuarios WHERE email_usuario=:email";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			
			$consulta->execute();
			
			$numero_filas=$consulta->rowCount();
			
			if($numero_filas==0){
				
				return("No");
				
			}elseif($numero_filas==1){
			
			$sql="UPDATE usuarios SET password_usuario=:password WHERE email_usuario=:email";
			
			$consulta=$conexion->prepare($sql);
			
			
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			
			
		
			
			$consulta->execute();
				
				return("Si");
			
			}elseif($numero_filas < 1){
				
				return("Error");
			}
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
		}
		
		
		
	}
	
}

