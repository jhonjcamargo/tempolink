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

<div class="menu">
	<a href="index.php"><img class="logo" src="images/logo-footer.png" alt=""/></a>
	
	<a class="link" href="index.php" <?php if($pagina == 'home'){ ?>class="select"<?php } ?>>INICIO</a>
    <a class="link" href="index.php?pag=pagina&id=1&padre=1" <?php if($_GET["padre"] == 1){ ?>class="select"<?php } ?>>QUIÉNES SOMOS</a>
    <a class="link" href="index.php?pag=pagina&id=5&padre=5" <?php if($_GET["padre"] == 5){ ?>class="select"<?php } ?>>PRODUCTOS Y SERVICIOS</a>
    <a class="link" href="index.php?pag=listadoOfertas" <?php if($pagina == 'listadoOfertas'){ ?>class="select"<?php } ?>>OFERTAS LABORALES</a>
    <a class="link" href="index.php?pag=empresas" <?php if($pagina == 'empresas'){ ?>class="select"<?php } ?>>EMPRESAS</a>
    <a class="link" href="index.php?pag=contacto" <?php if($pagina == 'contacto'){ ?>class="select"<?php } ?>>CONTÁCTENOS</a>
	


</div>