<section class="seccion">
<div class="contenedor">
	<div class="formulario_small clearfix">
		<h2>Login</h2>
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
				<div id="error"></div>
			<input type="submit" name="login" id="login" class="buttom_green" value="Acceder"/>
			</div>
		</form>
	
	</div>
	</div>
</section>