<?php  if(!$_SESSION['login']){
	
	header("location: ?controller=Enlaces&action=navegacionPaginas&pagina=index");
}

?>
<section class="seccion">
	<div class="navegacion_galerias">

		<button id="btn_actualizar">Actualizar perfil</button>
		<button id="btn_ampliar">Ampliar perfil</button>
		<button id="btn_password">Cambio contraseña</button>
	</div>
	
<div class="contenedor">
	<div class="formulario clearfix" id="actualizar">
		<h2>Modificar perfil</h2>
		<div ><p id="fallo"></p></div>
		<form method="post" action="?controller=Usuarios&action=actualizarUsuario&id=<?php echo $usuario->getIdUsuario(); ?>" onSubmit="return validarActualizar()">
		<div class="col_2_formulario">	
		<label for="nombre_usuario">Nombre</label>
			<input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre" value="<?php echo($usuario->getNombreUsuario()); ?>" />
		</div>	
			
			<div class="col_2_formulario">	
		<label for="email_usuario">Correo electrónico</label>
			<input type="text" name="email_usuario" id="email_usuario" placeholder="Alex@hot.com" value="<?php echo($usuario->getEmailUsuario()); ?>"/>
		</div>	
			<div class="col_formulario">
			
			<input type="submit" name="actualizar" id="btn_actualizar" class="buttom_green" value="Actualizar"/>
			</div>
		</form>

	</div><!--FORMULARIO ACTUALIZAR-->
	
	
	<div class="formulario clearfix" id="password">
		<h2>Cambiar contraseña</h2>
		<div ><p id="fallop"></p></div>
		<form method="post" action="?controller=Usuarios&action=actualizarPassword&id=<?php echo $usuario->getIdUsuario(); ?>" onSubmit="return validarActualizarPassword()">
				
		<div class="col_2_formulario">
			
		<label for="password_usuario">Nueva contraseña</label>
			<input type="password" name="password_usuario" id="password_usuario" pattern="?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="ej: Masdem22" title="La contraseña debe contener minúsculas, mayúsculas, números y tener una longitud de 8 caracteres"/>
			
			</div>
			
			<div class="col_2_formulario">
		<label for="rpassword_usuario">Repite contraseña</label>
			<input type="password" name="rpassword_usuario" id="rpassword_usuario"/>
			</div>
			<div class="col_formulario">
			
			<input type="submit" name="actualizar" id="btn_actualizar" class="buttom_green" value="Actualizar"/>
			</div>
		</form>
	
	</div>
	
	

	<?php if($usuario->getAmpliadoUsuario()){ ?>
	
	<div class="formulario clearfix" id="ampliar">
		<h2>Ampliar perfil</h2>
		<div ><p id="falloa"></p></div>
		<form method="post" action="?controller=Usuarios&action=ampliarPerfil&id=<?php echo($usuario->getIdUsuario()); ?>"  enctype="multipart/form-data" >
		
			<div class="col_formulario">
				
			<label for="imagen_usuario">Imagen</label>	
			<input type="file" name="archivo" id="imagen_usuario"/>
			
			</div>
			
			
		<div class="col_3_formulario">
			
		<label for="pais_usuario">País</label>
			<input type="text" name="pais_usuario" id="pais_usuario" value="<?php  echo $usuario->getPaisUsuario(); ?>"/>
			
			</div>
			
			<div class="col_3_formulario">
			
		<label for="ciudad_usuario">Ciudad</label>
			<input type="text" name="ciudad_usuario" id="ciudad_usuario" value="<?php  echo $usuario->getCiudadUsuario(); ?>"/>
			
			</div>
			
			<div class="col_3_formulario">
		<label for="poblacion_usuario">Población</label>
			<input type="text" name="poblacion_usuario" id="poblacion_usuario" value="<?php  echo $usuario->getPoblacionUsuario(); ?>"/>
			</div>
			
			<div class="col_formulario">
				
			<label for="descripcion">Algo sobre ti.....</label>
				<textarea name="descripcion_usuario" id="descripcion_usuario" cols="10" rows="10"><?php echo $usuario->getDescripcionUsuario(); ?></textarea>
			</div>
			<div class="col_formulario">
				
				<div class="leyenda">
				<small>Nombre la imagen con su nombre completo sin espacios.</small>
				</div>
			
			<input type="submit" name="ampliar_perfil" id="btn_ampliar_perfil" class="buttom_green" value="Guardar"/>
			</div>
		</form>
	
	</div>
	
	<?php }else{ ?>
	
	<div class="formulario clearfix" id="ampliar">
		<h2>Ampliar perfil</h2>
		<div ><p id="falloa"></p></div>
		<form method="post" action="?controller=Usuarios&action=actualizaePerfil&id=<?php echo($usuario->getIdUsuario()); ?>"  enctype="multipart/form-data">
		
			<div class="col_formulario">
				
			<label for="imagen_usuario">Imagen</label>	
			<input type="file" name="archivo" id="imagen_usuario"/>
			
			</div>
			
			
		<div class="col_3_formulario">
			
		<label for="pais_usuario">País</label>
			<input type="text" name="pais_usuario" id="pais_usuario"/>
			
			</div>
			
			<div class="col_3_formulario">
			
		<label for="ciudad_usuario">Ciudad</label>
			<input type="text" name="ciudad_usuario" id="ciudad_usuario"/>
			
			</div>
			
			<div class="col_3_formulario">
		<label for="poblacion_usuario">Población</label>
			<input type="text" name="poblacion_usuario" id="poblacion_usuario"/>
			</div>
			
			<div class="col_formulario">
				
			<label for="descripción">Algo sobre ti.....</label>
				<textarea name="descripcion_usuario" id="descripcion_usuario" cols="10" rows="10"></textarea>
			</div>
			<div class="col_formulario">
			
				<div class="leyenda">
				<small>Nombre la imagen con su nombre completo sin espacios.</small>
				</div>
				
			<input type="submit" name="ampliar_perfil" id="btn_ampliar_perfil" class="buttom_green" value="Guardar"/>
			</div>
		</form>
	
	</div>
<?php } ?>
	</div>
</section>