
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
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=casa">Mi hogar</a>
			<a href="?controller=Debates&action=listarDebates">Debates</a>
			<div class="menu_usuarios"> 
			<?php if($usuario->getImagenUsuario() != "NULL" && $usuario->getImagenUsuario() != ""){  ?>
				
				<button class="user_icono"><img src="<?php echo($usuario->getImagenUsuario()); ?>" class="imagen_usuario"/><span><?php echo($usuario->getNombreUsuario()); ?></span></button>
				
			<?php }else{ ?>
				
				<button class="user_icono"><i class="fas fa-user"></i><span><?php echo($usuario->getNombreUsuario()." ". $usuario->getPaisUsuario()); ?></span></button>
				
			<?php } ?>
				<div class="extendido_usuarios">
			<a href="?controller=Enlaces&action=navegacionPaginas&pagina=cerrarSesion">Cerrar sesión</a>
			<a href="?controller=Usuarios&action=modificarPerfil&id=<?php echo $usuario->getIdUsuario(); ?>">Modificar perfil</a>	
				</div>
			 </div>
		</nav>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->
<?php require_once("controladores/ControladorFrontal.php"); ?>