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
<meta http-equiv="Content-Language" content="en-us" />
<title><?php echo($titulo->getValor()); ?></title>
<meta name="Author" content="<?php echo($titulo->getValor()); ?>"/>
<meta name="Description" content="<?php echo($descripcion->getValor()); ?>"/>
<meta name="keywords" content="<?php echo($claves->getValor()); ?>"/>
<link rel="shortcut icon" href="images/<?php echo($favicon->getValor()); ?>"/>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="js/jquery.mCustomScrollbar.css" rel="stylesheet">
<link href="js/fancybox.css" rel="stylesheet" type="text/css" />
<link href="js/jquery.simplyscroll.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="js/coin-slider-styles.css" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="SpryAssets/SpryCollapsiblePanel.js" ></script>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js" ></script>
<script type="text/javascript" src="js/jqueryCycle.js" ></script>
<script type="text/javascript" src="js/fancybox.js"></script>
<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/coin-slider.js"></script>

<script type="text/javascript">


$(document).ready(function() {

	$("#inline").fancybox({
		'overlayOpacity': 0.7,
		'overlayColor'	: 'black',
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'easingIn'      : 'easeOutBack',
		'easingOut'     : 'easeInBack'
	});

	$('#slideBanner').coinslider({ 
//		width: 1024,
//		height: 350,
		navigation: true,
		delay: 5000,
		hoverPause: false 
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

	$('#pics').cycle({ 
		fx:    'fade', 
	  	speed:  2000 
	});
	
	$("#ofert-sub").mCustomScrollbar({
		theme:"rounded-dots",
		scrollInertia:400
	});
	
});

</script>
</head>

<body>
<div class="contenedor">
	<?php require_once ("menu.php"); ?>
	<?php require_once ("rotador.php"); ?>
	<!--   ************************************Contenido ************************ -->
	 <div class="contenido2">
		<div class="widthWrap">
			<div style="display:none;">
				<div id="data">
				<?php require_once ("loginUsuario.php"); ?>
		        </div>
		  	</div>
			<?php if ($pagina =="home"){?> 
			Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt inc
			<div class="contenido">
				<div class="contenidoa">
				    <span class="titulo">Tempolink</span>
				    <br/><br/>
				    Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt inc 
				    cibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt inc <BR><BR>
				    <a href="" class="boton-co">Ver mas</a>
				</div>
			<?php }require_once ($pagina.".php"); ?>
	         <?php if ($pagina =="home"){?> 	
				<div class="contenidoa">
			        <span class="titulo">Human Link</span>
			         <br><br>
			            Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt inc 
			            cibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt inc <BR><BR>
			            <a href="" class="boton-co">Ver mas</a>
			    </div>
			</div>
			<?php }?>
		</div>
	</div>
<div class="widthWrap">
		<?php require_once ("footer.php");?>
</div>
</div>

</body>
</html>