<?php 
$usuario=new UsuariosModelo();
$usuario=$usuario->getById($id);
?>
<div class="barra">
		<div class="contenedor clearfix">
	<div class="logo">
		<img src="img/logo.png" alt="Logo">
		</div>
		<div class="menu-movil">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="navegacion-principal clearfix">
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=index">Inicio</a>
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=galeria">Galería</a>
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=entradas">Entradas</a>
			<!--<div class="menu_usuarios">
			<a href="#" class="user_icono"><i class="fas fa-user">Alejandro<?php //echo($usuario->getNombreUsuario()); ?></a>
				<div class="extendido_usuarios">-->
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=cerrarSesion">Cerrar sesión</a>
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=modificarPerfil">Modificar perfil</a>	
			<!--	</div>
			</div>-->
		</nav>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->
<?php require_once("controladores/ControladorFrontal.php"); ?>