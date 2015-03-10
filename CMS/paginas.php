<?php

$opcion = "paginasInicio";
if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
    $opcion = $_GET["opc"];
}

?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
            <li><a href="index.php?pag=paginas&opc=listadoPaginas" <?php if($opcion == "listadoPaginas"){ echo("class='selected'"); } ?>>Listado p&aacute;ginas internas</a></li>
            <li><a href="index.php?pag=paginas&opc=listadoClientes" <?php if($opcion == "listadoClientes"){ echo("class='selected'"); } ?>>Listado clientes</a></li>
        </ul>
    </span>
    <span class="bottom">&nbsp;</span>
</div>
<div class="box_right">
    <span class="center">
        <div class="text_inner"><?php include($opcion.".php"); ?></div>
    </span>
    <span class="bottom">&nbsp;</span>
</div>