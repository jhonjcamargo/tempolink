<?php
	$opcion = "recursosInicio";
	if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
	    $opcion = $_GET["opc"];
	}
?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
            <li><a href="index.php?pag=recursos&opc=listadoRecursos" <?php if($opcion == "listadoRecursos"){ echo("class='selected'"); } ?>>Listado de recursos disponibles</a></li>
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