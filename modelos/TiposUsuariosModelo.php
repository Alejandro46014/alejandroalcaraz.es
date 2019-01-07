<?php

class TiposUsuariosModelo{
	
	private $id,$tipo_usuario;
	
	public function TiposUsuariosModelo(){
		
		$this->id=2;
		$this->tipo_usuario="Usuario standar";
	}
	
	public function getIdTipoUsuario(){
		
		return($this->id);
	}
	
	public function getTipoUsuario(){
		
		return($this->tipo_usuario);
	}
	
	public function setIdTipoUsuario($id){
		
		$this->id=$id;
	}
	
	public function setTipoUsuario($tipo_usuario){
		
		$this->tipo_usuario=$tipo_usuario;
	}
}