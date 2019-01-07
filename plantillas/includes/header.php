<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Alejandro</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
	
	<?php
	$archivo=basename($_SERVER['PHP_SELF']);
	$pagina=str_replace(".php","",$archivo);
	if($pagina==='index'){
		
	echo('<link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
	<link rel="stylesheet" href="css/fotorama.css">
  <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">');
		
	}else{
		
		echo('<link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="../css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
	<link rel="stylesheet" href="../css/fotorama.css">
  <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
	<link rel="stylesheet" href="../css/estilos.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">');
	}
	?>
</head>

<body class="<?php echo($pagina); ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
	<div class="hero">
	  <div class="contenido-header">
		<nav class="redes-sociales">
		    <a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
			<a href="#"><i class=" fab fa-twitter-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-instagram-square" aria-hidden="true"></i></a>
			
		  </nav>
		  <div class="informacion-evento">
			  <div class="clearfix">
				  <?php setlocale(LC_ALL, 'es_ES'); ?>
		  <p class="fecha"><i class="fas fa-calendar-alt"></i> <?php echo strftime("%A %e %B %Y", mktime(date("d-M-Y"))); ?></p>
			  <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Valencia, España</p>
		  </div>
		  
			  <h1 class="nombre-sitio">alcaraz</h1>
			  
		  <p class="slogan">La mejor siempre <span>es fluir</span></p>
		  </div><!--.INFORMACION-EVENTO-->
		  </div>
	  </div><!--.HERO-->
	</header>
	
	
