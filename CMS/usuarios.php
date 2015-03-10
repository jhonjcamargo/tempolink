<?php
	$opcion = "usuariosInicio";
	if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
	    $opcion = $_GET["opc"];
	}
?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
			<li><a href="index.php?pag=usuarios&opc=listadoCMS" <?php if($opcion == "listadoCMS"){ echo("class='selected'"); } ?>>CMS</a></li>
			<li><a href="index.php?pag=usuarios&opc=listadoTempo" <?php if($opcion == "listadoTempo"){ echo("class='selected'"); } ?>>Listado usuarios tempolink</a></li>
			<li><a href="index.php?pag=usuarios&opc=recursosUsuario" <?php if($opcion == "recursosUsuario"){ echo("class='selected'"); } ?>>Recursos por usuario</a></li>
        </ul>
    </span>
    <span class="bottom">&nbsp;</span>
</div>
<div class="box_right">
    <span class="center">
        <div class="text_inner"><?php include($opcion.".php") ?></div>
    </span>
    <span class="bottom">&nbsp;</span>
</div>