<footer class="site-footer">
		<div class="contenedor clearfix">
			<div class="footer-informacion">
			<h3>Sobre la <span>vida</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</p>
			</div>
			<div class="ultimos-tweets">
			<h3>Ultimas <span>entradas</span></h3>
				<ul>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
				</ul>
			</div>
			<div class="menu-footer">
			<h3>Redes <span>sociales</span></h3>
				<nav class="redes-sociales-footer">
		    <a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
			<a href="#"><i class=" fab fa-twitter-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-instagram-square" aria-hidden="true"></i></a>
			
		  </nav>
			</div>
		</div>
		<p class="copyright">Todos los derechos reservados 2018</p>
	</footer>
	
	
	
	<!--LINKADO DE JAVASCRIPT-->
	
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/jquery.animateNumber.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/jquery.lettering.js"></script>
	<script src="js/plugins.js"></script>

<?php
	$archivo=basename($_SERVER['PHP_SELF']);
	$pagina=str_replace(".php","",$archivo);
	
	if($pagina==='invitados' || $pagina==='index'){
		
		echo('<script src="js/jquery.colorbox-min.js"></script>');
	}elseif($pagina==='conferencias'){
		
		echo('<script src="js/lightbox.js"></script>');
	}
	?>
<script src="js/jquery.countdown.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script src="js/fotorama.js" async defer></script>
</body>

</html>
