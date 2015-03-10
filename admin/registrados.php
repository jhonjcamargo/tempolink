<?php
	$opcion = "listadoRegistados";
	if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
	    $opcion = $_GET["opc"];
	}
?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
            <li><a href="index.php?pag=registrados&opc=listadoRegistados" <?php if($opcion == "listadoRegistados"){ echo("class='selected'"); } ?>>Listado de usuarios registrados</a></li>
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