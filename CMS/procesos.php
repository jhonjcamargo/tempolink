<?php

$opcion = "procesosInicio";
if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
    $opcion = $_GET["opc"];
}

?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
            <li><a href="index.php?pag=procesos&opc=listadoCatCargos" <?php if($opcion == "listadoCatCargos"){ echo("class='selected'"); } ?>>Listado categorias cargos</a></li>
            <li><a href="index.php?pag=procesos&opc=listadoCargos" <?php if($opcion == "listadoCargos"){ echo("class='selected'"); } ?>>Listado cargos</a></li>
            <li><a href="index.php?pag=procesos&opc=listadoOfertas" <?php if($opcion == "listadoOfertas"){ echo("class='selected'"); } ?>>Listado ofertas laborales</a></li>
            <li><a href="index.php?pag=procesos&opc=listadoInscritos" <?php if($opcion == "listadoInscritos"){ echo("class='selected'"); } ?>>Listado inscritos</a></li>
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