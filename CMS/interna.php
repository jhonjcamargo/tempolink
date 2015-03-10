<?php
session_start();
$pagina = "inicio";
if( isset($_GET["pag"]) && $_GET["pag"] != "" ){
    $pagina = $_GET["pag"];
}
?>
<div id="container">
	<div id="navigation">
        <a href="#" id="title_site"></a>
		<a href="index.php" id="home">Inicio</a>
		<a id="contacto" href="logout.php">Salir</a>
		<div id="sitio" href="#">CMS: <a href="../index.php" target="_blank">www.tempolink.com.co</a></div>
		<ul id="tabs" name="tabs">
			<li><a href="index.php?pag=general" <?php if($pagina == "general"){ echo("class='selected'"); } ?>><em>»</em>Datos Globales</a></li>
			<li><a href="index.php?pag=paginas" <?php if($pagina == "paginas"){ echo("class='selected'"); } ?>><em>»</em>P&aacute;ginas</a></li>
			<li><a href="index.php?pag=usuarios" <?php if($pagina == "usuarios"){ echo("class='selected'"); } ?>><em>»</em>Usuarios</a></li>
			<li><a href="index.php?pag=recursos" <?php if($pagina == "recursos"){ echo("class='selected'"); } ?>><em>»</em>Recursos</a></li>
			<li><a href="index.php?pag=procesos" <?php if($pagina == "procesos"){ echo("class='selected'"); } ?>><em>»</em>Procesos TempoLink</a></li>
		</ul>
	</div>
	<ul id="content">
		<li class="left">
			<div id="boxes_inner"><?php include($pagina.".php");?></div>
		</li>
	</ul>
	<div id="footer"><?php include("footer.php"); ?></div>
</div>