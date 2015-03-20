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
<div id="navTop">
    <!--<div class="registro">
        <?php /**
        if( !isset($_SESSION["usuarioTempo"]) ){?>
        	<a id="inline" href="#data" class="cuenta">Iniciar sesión</a>
 			<a href="index.php?pag=registro">Registrarse</a>
		<?php }
		else {
			echo('
			<a href="index.php?pag=perfil">Mi perfil</a>
			<a href="index.php?pag=logout" class="cuenta">Logout</a>');	
		}*/
		?>
    </div>-->
    <div class="redes">
	<?php if($numRedes != 0 ){
		for($i = 0; $i < $numRedes ; $i++ ){?>
			<a href="<?php echo($redes[$i]->getLink()); ?>" target="_blank">
				<img src="images/redes/<?php echo($redes[$i]->getThumb()); ?>" title="<?php echo($redes[$i]->getNombre()); ?>" alt="<?php echo($redes[$i]->getNombre()); ?>" />	
			</a>
    <?php }}?>
    </div>
</div>
<div class="menu">
	<a href="index.php"><img class="logo" src="images/logo-footer.png" alt=""/></a>
	
	<a class="link <?php if($pagina == 'home'){ echo 'select'; }?>" href="index.php" >INICIO</a>
    <a class="link" href="index.php?pag=pagina&id=1&padre=1" <?php //if($_GET["padre"] == 1){ ?>class="select"<?php //} ?>>QUIÉNES SOMOS</a>
    <a class="link" href="index.php?pag=pagina&id=5&padre=5" <?php //if($_GET["padre"] == 5){ ?>class="select"<?php //} ?>>PRODUCTOS Y SERVICIOS</a>
    <a class="link" href="index.php?pag=listadoOfertas" <?php if($pagina == 'listadoOfertas'){ ?>class="select"<?php } ?>>OFERTAS LABORALES</a>
    <a class="link" href="index.php?pag=empresas" <?php if($pagina == 'empresas'){ ?>class="select"<?php } ?>>EMPRESAS</a>
    <a class="link" href="index.php?pag=contacto" <?php if($pagina == 'contacto'){ ?>class="select"<?php } ?>>CONTÁCTENOS</a>
	

	<!-- <a class="redes space fb" href="<?php //echo $general->fb ?>" target="_blank" ><img src="/images/basic/fb.png" alt="accesorios y acabados" /></a>
	<a class="redes tw" href="<?php //echo $general->twitter ?>" target="_blank"><img src="/images/basic/tw.png" alt="accesorios y acabados" /></a> -->
</div>