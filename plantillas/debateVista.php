<?php
	session_start();
	$id_usuario=$_SESSION['id'];
	$uso=new UsuariosModelo();
	$usuario=$uso->getById($id_usuario);

?>
<section class="seccion">
<div class="contenedor">
	<div class="cabecera_debate">
	
		<div class="imagen_debate">
	
			<img src="<?php echo($debate->getImagenDebate()); ?>" alt="Imagen no disponible"/>
	</div>
		<div class="titulo_debate">
	
			<h2><?php echo($debate->getTituloDebate()); ?></h2>
	</div>
		
	</div>
	
	<div class="formulario clearfix">
	
		<h2>Nuevo comentario</h2>
		
		<form method="post" action="?controller=Entradas&action=nuevaEntrada&id=<?php echo($debate->getIdDebate()); ?>"</form>
			
			<div class="col_formulario">
			<input type="hidden" name="id_usuario" value="<?php echo($usuario->getIdUsuario()); ?>"/>	
			<label for="comentario_entrada">Deja tu comentario</label>
				<textarea name="comentario_entrada" id="comentario_entrada" cols="10" rows="10"></textarea>
			</div>
			<div class="col_formulario">
			
			<input type="submit" name="btn_comentario_entrada" id="btn_comentario_entrada" class="buttom_green" value="Comentar"/>
				
			</div>
		</form>
	
	</div>
	<?php foreach($entradas as $entrada){
	
	$uso=new UsuariosModelo();
	$usuarioentrada=$uso->getById($entrada->getIdUsuario());
	?>
	<div class="comentario_entrada">
		
		<div class="clearfix">
		
		<div class="autor_entrada">
			
			<h4><?php echo($usuarioentrada->getNombreUsuario()); ?></h4>
			
		</div>
		
		<div class="fecha_entrada">
			
			<p><?php echo($entrada->getFechaEntrada()); ?></p>
			
		</div>
		</div>
		
<<<<<<< HEAD
		<div class="comentario_entrada">
			
			<p><?php echo($entrada->getComentarioEntrada()); ?></p>
			
		</div>
		
=======
		<div class="comentario">
			<p><?php echo($entrada->getComentarioEntrada()); ?></p>
		</div>
>>>>>>> origin/master
	</div>
	
	<?php } ?>
	
	
	</div>
</section>