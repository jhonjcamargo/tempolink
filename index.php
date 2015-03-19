<?php 
session_start();
require_once("DAO/Configuracion.php");


$favicon        = Configuracion::cargar(Configuracion::FAVICON);
$titulo         = Configuracion::cargar(Configuracion::TITULO);
$descripcion    = Configuracion::cargar(Configuracion::DESCRIPCION);
$claves         = Configuracion::cargar(Configuracion::KEYWORDS);
if( isset($_GET['pag']) && $_GET['pag'] != "" ){
    $pagina = $_GET["pag"];
}
else $pagina="home";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="en-us">
<title><?php echo($titulo->getValor()); ?></title>
<link rel="shortcut icon" href="images/<?php echo($favicon->getValor()); ?>">
<meta name="Author" content="<?php echo($titulo->getValor()); ?>"/>
<meta name="Description" content="<?php echo($descripcion->getValor()); ?>">
<meta name="keywords" content="<?php echo($claves->getValor()); ?>">
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="js/fancybox.css" rel="stylesheet" type="text/css" />
<link href="js/jquery.simplyscroll.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="js/fancybox.js"></script>
<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/coin-slider.js"></script>
<script src="js/jqueryCycle.js" type="text/javascript"></script>
<link rel="stylesheet" href="js/coin-slider-styles.css" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	
	  
	  	$(document).ready(function() {

	  		$("#inline").fancybox({
				'overlayOpacity'	:	0.7,
				'overlayColor'		:	'black',
				'overlayShow'		:	true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'easingIn'      : 'easeOutBack',
				'easingOut'     : 'easeInBack'
		 	});

			$('#slideBanner').coinslider({ 
// 				width: 1024,
// 				height: 350,
				navigation: true,
				delay: 5000,
				hoverPause: false 
			});

			$('#pics').cycle({ 
			    fx:    'fade', 
			    speed:  2000 
			 });

			$('#frmInfoAcad').ajaxForm({
			  	target: '#infoAcad',
			  	success: function() {
					$('#infoAcad').fadeIn('slow');
			  	}
			});

			$("#scroller").simplyScroll({
				autoMode: 'loop',
				frameRate: 18
			});


		});
</script>
</head>

<body>
<div id="header">
   	<?php require_once ("menu.php"); ?>
</div>
<?php require_once ("rotador.php"); ?>
<!-- ESTE ES UN CAMBIO EN EL INDEX -->
<div id="main">
    <div id="contenido">
        <div class="cajas">
            <div class="cajaTexto">
            <div style="display:none;">
                    <div id="data">
						<?php require_once ("loginUsuario.php"); ?>
                    </div>               
                </div>
                <?php require_once ($pagina.".php"); ?>
            </div>
            <div class="cajaMenu">
            	<?php require_once ("menuLateral.php"); ?>
            </div>
		</div>
    </div>
</div>
</body>
<?php require_once ("footer.php"); ?>
</html>