<section class="seccion">
<div class="contenedor">
	<div class="formulario clearfix">
		<h2>Registro</h2>
		<form method="post" action="?controller=Usuarios&action=crearUsuario" onSubmit="return validarRegistro()">
		<div class="col_2_formulario">	
		<label for="email_usuario">Nombre</label>
			<input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre" />
		</div>	
			
			<div class="col_2_formulario">	
		<label for="email_usuario">Correo electrónico</label>
			<input type="text" name="email_usuario" id="email_usuario" placeholder="Alex@hot.com" />
		</div>	
		
		<div class="col_2_formulario">
		<label for="password_usuario">Contraseña</label>
			<input type="password" name="password_usuario" id="password_usuario" pattern="?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="ej: Masdem22" title="La contraseña debe contener minúsculas, mayúsculas, números y tener una longitud de 8 caracteres"/>
			</div>
			
			<div class="col_2_formulario">
		<label for="password_usuario">Repite contraseña</label>
			<input type="password" name="rpassword_usuario" id="rpassword_usuario"/>
			</div>
			<div class="terminos">
				<input type="checkbox" id="terminos"><p><a href="#">Acepta terminos y condiciones</a></p>
			</div>
			<div class="col_formulario">
				<div id="error"></div>
			<input type="submit" name="login" id="btn_registro" class="buttom_green" value="Registro"/>
			</div>
		</form>
	
	</div>
	</div>
</section>