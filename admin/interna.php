<?php
session_start();
$pagina = "inicio";
if( isset($_GET["pag"]) && $_GET["pag"] != "" ){
    $pagina = $_GET["pag"];
}
?>
<div id="container">
	<div id="navigation">
        <a href="index.php" id="title_site"></a>
		<a href="index.php" id="home">Inicio</a>
		<a id="contacto" href="logout.php">Salir</a>
			<ul id="tabs" name="tabs">
            <?php if($_SESSION['tipo'] == 'empleado'){ ?>
				<li><a href="index.php?pag=recursos" <?php if($pagina == "recursos"){ echo("class='selected'"); } ?>><em>»</em>Listado de recursos</a></li>
           <?php }
		   else if ($_SESSION['tipo'] == 'empresa'){?>
				<li><a href="index.php?pag=registrados" <?php if($pagina == "registrados"){ echo("class='selected'"); } ?>><em>»</em>Listado usuarios registrados</a></li>
		<?php } ?>	
			</ul>
	</div>
	<ul id="content">
		<li class="left">
			<div id="boxes_inner"><?php include($pagina.".php");?></div>
		</li>
	</ul>
	<div id="footer"><?php include("footer.php"); ?></div>
</div>