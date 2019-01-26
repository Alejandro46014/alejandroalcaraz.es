<section class="seccion">
	<div class="contenedor">
	<div class="formulario clearfix">
		
		<h2>Nuevo debate</h2>
		<div ><p id="fallo"></p></div>
		<form method="post" action="?controller=Debates&action=crearDebate"  enctype="multipart/form-data" >
		
			<div class="col_formulario">
				
			<label for="imagen_debate">Imagen</label>	
			<input type="file" name="imagen_debate" id="imagen_debate"/>
			
			</div>
			
			
		<div class="col_formulario">
			
		<label for="titulo_debate">Título</label>
			<input type="text" name="titulo_debate" id="titulo_debate"/>
			
			</div>
			
			<div class="col_formulario">
			
			<input type="submit" name="crear_debate" id="crear_debate" class="buttom_green" value="Crear"/>
			</div>
		</form>
		</div>
		
		<div class="tabla">
		
		<table class="tabla">
			<thead>
			<tr>
				<th>Título</th>
				<th>Imagen</th>
			</tr>
			</thead>
			<tbody>
		
		<?php foreach($debates as $debate){ ?>
		
		
			<tr>
				<td class="td-1"><a href="?controller=Debates&action=entrarDebate&id=<?php echo($debate->getIdDebate()); ?>"><?php echo($debate->getTituloDebate()); ?></a></td>
				<td><a href="?controller=Debates&action=entrarDebate&id=<?php echo($debate->getIdDebate()); ?>"><img src="<?php echo($debate->getImagenDebate()); ?>" alt="Imagen no disponible"/></a></td>
		
			</tr>
			
		
		<?php } ?>
				
		</tbody>
	</table>
	</div>
</div>
</section>