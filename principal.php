<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
       
		<meta name="keywords" content="Tempolink" />
	
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/estiloL.css" />
		
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Texto superior -->
			<div class="txtSuperior">
				<a href="index.php?pag=contacto"><span>+ Contactenos</span></a>
				<span class="right"><a  href="index.php"><span>ir a tempolink + </span></a></span>
			</div>
            
            
			<div id="wrap" class="wrap">
				<div class="estilo">
					 <img class="estilo__img" src="images/newimg/Portada-HL.png" /> 
					<!--<img class="estilo__img" src="images/newimg/principal.png" />-->
					<div >
						<ul id="centroDimensionar" class="centroDimensionar">
							<li></li>							
						</ul>
			</div>
					<header class="txt-tempolink">
						<h1><span>BIENVENIDO</span>
                        <a href="index.php" style="color:#FFF !important;">Tempolink | Humanlink</a> <i>Nos encargamos de desarrollar estrategias en gestión humana para la potencializar el área, haciéndola llegar a ser Business Partner de la compañía</i></h1>
                        <!-- <a href="index.php" style="color:#FFF !important;">Humanlink</a> <i>En Tempolink desarrollamos en conjunto con la empresa, la estrategia de selección del talento humano y todo el proceso de contratación necesario para desarrollar la operación de nuestro cliente.<a href="#">Ola k mira, ola k kuenta..</a></i></h1> --> 
					</header>
				</div>
			</div>
			
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/main.js"></script>
		<script>
			(function() {
				new centroDimensionar( document.getElementById( 'centroDimensionar' ) );

				/* estilo responsiveness */
				var body = docElem = window.document.documentElement,
					wrap = document.getElementById( 'wrap' ),
					estilo = wrap.querySelector( '.estilo' ),
					estiloWidth = estilo.offsetWidth;

				scaleestilo();

				function scaleestilo() {
					var wrapWidth = wrap.offsetWidth,
						val = wrapWidth / estiloWidth;

					estilo.style.transform = 'scale3d(' + val + ', ' + val + ', 1)';
				}
				
				window.addEventListener( 'resize', resizeHandler );

				function resizeHandler() {
					function delayed() {
						resize();
						resizeTimeout = null;
					}
					if ( typeof resizeTimeout != 'undefined' ) {
						clearTimeout( resizeTimeout );
					}
					resizeTimeout = setTimeout( delayed, 50 );
				}

				function resize() {
					scaleestilo();
				}
			})();
		</script>
	</body>
</html>
