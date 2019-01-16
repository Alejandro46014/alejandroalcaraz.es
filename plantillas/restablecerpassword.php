<section class="seccion">
<div class="contenedor">
	<div class="formulario_small clearfix">
		<h2>Login</h2>
		<div><p id="fallor"></p></div>
		<form method="post" action="?controller=Usuarios&action=restablecerPassword" onSubmit="return validarResetPassword()">
		<div class="col_formulario">	
		<label for="email_usuario">Correo electrónico</label>
			<input type="email" name="email_usuario" id="email_usuario" placeholder="Alex@hot.com"/>
		</div>	
		
		<div class="col_formulario">
		<label for="password_usuario">Contraseña</label>
			<input type="password" name="password_usuario" id="password_usuario" placeholder="ej: Masdem22"/>
			</div>
			
			<div class="col_formulario">
		<label for="rpassword_usuario">Repite contraseña</label>
			<input type="password" name="rpassword_usuario" id="rpassword_usuario" placeholder="ej: Masdem22"/>
			</div>
			
			<div class="col_formulario">
				<small>Introduzca la dirección de correo electrónico con la que se registró</small>
			</div>
			<div class="col_formulario">
				<button type="submit" name="reset" id="reset" class="buttom_green">Actualizar</button>
			</div>
		</form>
	</div>
	</div>
</section>