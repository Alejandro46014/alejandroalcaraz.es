<section class="seccion">
<div class="contenedor">
	<div class="formulario_small clearfix">
		<h2>Login</h2>
		<div><p id="fallo"></p></div>
		<form method="post" action="?controller=Usuarios&action=loguearse" onSubmit="return validarIngreso()">
		<div class="col_formulario">	
		<label for="email_usuario">Correo electrónico</label>
			<input type="email" name="email_usuario" id="email_usuario" placeholder="Alex@hot.com"/>
		</div>	
		
		<div class="col_formulario">
		<label for="password_usuario">Contraseña</label>
			<input type="password" name="password_usuario" id="password_usuario" placeholder="ej: Masdem22"/>
			</div>
			<div class="col_formulario">
				<button type="submit" name="login" id="login" class="buttom_green">Acceder</button>
			</div>
		</form>
		<div class="recuperar_password">
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=restablecerPassword">¿Olvidaste tu contraseña?</a>
		</div>
	</div>
	</div>
</section>