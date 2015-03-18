<?php 
require_once("DAO/Redes.php");
require_once("DAO/Cliente.php");
require_once("DAO/Configuracion.php");
$banner			= Configuracion::cargar(Configuracion::BANNER);
$cliente = Cliente::listado();
$numClientes = count($cliente);
$redes = Redes::listado();
$numRedes = count($redes);
?>
<h1 id="logo">
    <a href="index.php"></a>
</h1>
<div id="navTop">
    <ul class="registro">
        <?php
        if( !isset($_SESSION["usuarioTempo"]) ){?>
 			<li><a href="index.php?pag=registro">Registrarse</a></li>
        	<li><a id="inline" href="#data" class="cuenta">Mi Cuenta</a></li>
		<?php }
		else {
			echo('
			<li style="padding-right:50px;"><a href="index.php?pag=perfil">Mi perfil</a></li>
			<li><a href="index.php?pag=logout" class="cuenta">Logout</a></li>');	
		}
		?>
        </li>
    </ul>
</div>
<ul id="menu">
    <li><a href="index.php" <?php if($pagina == 'home'){ ?>class="select"<?php } ?>>Inicio</a></li>
    <li><a href="index.php?pag=pagina&id=1&padre=1" <?php if($_GET["padre"] == 1){ ?>class="select"<?php } ?>>Quienes Somos</a></li>
    <li><a href="index.php?pag=pagina&id=5&padre=5" <?php if($_GET["padre"] == 5){ ?>class="select"<?php } ?>>Productos y servicios</a></li>
    <li><a href="index.php?pag=listadoOfertas" <?php if($pagina == 'listadoOfertas'){ ?>class="select"<?php } ?>>Ofertas Laborales</a></li>
    <li><a href="index.php?pag=empresas" <?php if($pagina == 'empresas'){ ?>class="select"<?php } ?>>Empresas</a></li>
    <li><a href="index.php?pag=contacto" <?php if($pagina == 'contacto'){ ?>class="select"<?php } ?>>Cont&aacute;ctenos</a></li>
</ul>
<ul id="socialTop">
	<?php 
	if($numRedes != 0 ){
		for($i = 0; $i < $numRedes ; $i++ ){?>
    	<li><a href="<?php echo($redes[$i]->getLink()); ?>" target="_blank"><img src="images/redes/<?php echo($redes[$i]->getThumb()); ?>" title="<?php echo($redes[$i]->getNombre()); ?>" width="22" height="22" alt="<?php echo($redes[$i]->getNombre()); ?>" /></a></li>
    <?php }
	}?>
</ul>
<?php if ($pagina =="home"){?> 
<div id="banner">
	<a href="admin/index.php" class="empleados" target="_blank"></a>
	<a href="admin/index.php" class="empresas" target="_blank"></a>
	<div id="slideBanner">
    	<img src="images/slide/1.jpg" alt="TempoLink" />
    	<img src="images/slide/2.jpg" alt="TempoLink" />
        <img src="images/slide/3.jpg" alt="TempoLink" />
        <img src="images/slide/4.jpg" alt="TempoLink" />
        <img src="images/slide/5.jpg" alt="TempoLink" />
        <img src="images/slide/6.jpg" alt="TempoLink" />
        <img src="images/slide/7.jpg" alt="TempoLink" />
        <img src="images/slide/8.jpg" alt="TempoLink" />
        <img src="images/slide/9.jpg" alt="TempoLink" />
        <img src="images/slide/10.jpg" alt="TempoLink" />
    </div>

	<?php /*?><div id="spot">
    	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="978" height="366" id="banner" align="middle">
				<param name="movie" value="images/<?php echo($banner->getValor()); ?>" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="images/<?php echo($banner->getValor()); ?>" width="978" height="366">
					<param name="movie" value="images/<?php echo($banner->getValor()); ?>" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
    </div><?php */?>
    <div id="thumbs">
    	<h1 style="color: #666666; font-family: 'Calibri',Arial,Helvetica,Geneva,sans-serif; text-align: center;margin-top: 30px">LIDERES EN ADMINISTRACÍON INTEGRAL DEL TALENTO HUMANO</h1>
        <?php /* <ul id="scroller">
        	<?php for($i = 0; $i < $numClientes ; $i++ ){ ?>
            <li><img src="clientes/<?php echo($cliente[$i]->getThumb()) ?>" width="94" height="94"></li>
            <?php } ?>
        </ul>
        */ ?>
    </div>
</div>
<ul class="tabsPasos">
    <li><a href="index.php?pag=registro"><img src="images/registrate.png" /></a></li>
    <li><a href="index.php?pag=perfil"><img src="images/carga.png" /></a></li>
    <li class="post"><a href="index.php?pag=listadoOfertas"><img src="images/postulate.png" /></a></li>
</ul>
<?php }?>    