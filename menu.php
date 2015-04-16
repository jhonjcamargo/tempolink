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
<div class="cont-menu">
<div class="contenidofooter">
  	<div class="logo">
  		<a href="index.php"><img class="logoimg" src="images/Tempolink_logo.png"></a>
  	</div>
  	
  	<ul class="menu">
		<li><a class="<?php if($pagina == 'home'){ echo 'seleccionado'; }?>" href="index.php" >Inicio</a></li>
	    <li><a href="index.php?pag=pagina&id=1&padre=1" <?php /* if($_GET["padre"] == 1){ echo 'class="seleccionado"'; }*/ ?>>Nosotros</a></li>
	    <li><a href="index.php?pag=pagina&id=5&padre=5" <?php /* if($_GET["id"] == 5){ echo 'class="seleccionado"'; } */ ?>>Servicios</a></li>
	    <li><a href="index.php?pag=pagina&id=6&padre=5" <?php /* if($_GET["id"] == 6){ echo 'class="seleccionado"'; } */ ?>>Productos</a></li>
	    <li><a href="index.php?pag=listadoOfertas" <?php if($pagina == 'listadoOfertas' ||$pagina == 'oferta'){ ?>class="seleccionado"<?php } ?>>Ofertas laborales</a></li>
	    <li><a href="index.php?pag=empresas" <?php if($pagina == 'empresas'){ ?>class="seleccionado"<?php } ?>>e-Learning</a></li>
	    <li><a href="index.php?pag=contacto" <?php if($pagina == 'contacto'){ ?>class="seleccionado"<?php } ?>>Contáctenos</a></li>	
	</ul>
	
	<!-- 
	<div class="sesion">
	  	<?php /* if( !isset($_SESSION["usuarioTempo"]) ){?>
	  		<a id="inline" href="#data" class="cuenta">Ingreso</a> - <a href="index.php?pag=registro">Registro</a>
	  	<?php } else { ?>
			<a href="index.php?pag=perfil">Perfil</a> - <a href="index.php?pag=logout" class="cuenta">Logout</a>	
		<?php }*/?>
	</div>
	<div class="logoder">
  		<a href="index.php"><img class="logoimg" src="images/newimg/HUMAN-LINKFinal.png"></a>
  	</div> --> 
</div>
</div>
<div class="redes">
	<?php if($numRedes != 0 ){
		for($i = 0; $i < $numRedes ; $i++ ){?>
			<a href="<?php echo($redes[$i]->getLink()); ?>" target="_blank">
				<img src="images/redes/<?php echo($redes[$i]->getThumb()); ?>" title="<?php echo($redes[$i]->getNombre()); ?>" alt="<?php echo($redes[$i]->getNombre()); ?>" />	
			</a>
    <?php }}?>
</div>