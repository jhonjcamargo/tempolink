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
  	<div class="logo">
  		<a href="index.html"><img src="images/Tempolink_logo.png" width="149" height="18"></a>
  	</div>
  	<div class="sesion">
	  	<?php if( !isset($_SESSION["usuarioTempo"]) ){?>
	  		<a id="inline" href="#data" class="cuenta">Ingreso</a> - <a href="index.php?pag=registro">Registro</a>
	  	<?php } else { ?>
			<a href="index.php?pag=perfil">Mi perfil</a> - <a href="index.php?pag=logout" class="cuenta">Logout</a>	
		<?php }?>
	</div>
  	<ul class="menu">
		<li><a class="<?php if($pagina == 'home'){ echo 'class="seleccionado"'; }?>" href="index.php" >INICIO</a></li>
	    <li><a href="index.php?pag=pagina&id=1&padre=1" <?php /*if($_GET["padre"] == 1){ echo 'class="seleccionado"'; }*/ ?>>QUIÉNES SOMOS</a></li>
	    <li><a href="index.php?pag=pagina&id=5&padre=5" <?php /*if($_GET["padre"] == 5){ echo 'class="seleccionado"'; } */ ?>>PRODUCTOS Y SERVICIOS</a></li>
	    <li><a href="index.php?pag=listadoOfertas" <?php if($pagina == 'listadoOfertas'){ ?>class="seleccionado"<?php } ?>>OFERTAS LABORALES</a></li>
	    <li><a href="index.php?pag=empresas" <?php if($pagina == 'empresas'){ ?>class="seleccionado"<?php } ?>>EMPRESAS</a></li>
	    <li><a href="index.php?pag=contacto" <?php if($pagina == 'contacto'){ ?>class="seleccionado"<?php } ?>>CONTÁCTENOS</a></li>	
	</ul>
</div>