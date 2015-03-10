<?php

$opcion = "generalIni";
if( isset($_GET["opc"]) && $_GET["opc"] != "" ){
    $opcion = $_GET["opc"];
}

?>
<div class="box_left">
    <span class="center">
        <ul class="shortList">
            <li><a href="index.php?pag=general&opc=favicon" <?php if($opcion == "favicon"){ echo("class='selected'"); } ?>>Favicon</a></li>
            <li><a href="index.php?pag=general&opc=titulo" <?php if($opcion == "titulo"){ echo("class='selected'"); } ?>>T&iacute;tulo</a></li>
            <li><a href="index.php?pag=general&opc=claves" <?php if($opcion == "claves"){ echo("class='selected'"); } ?>>Palabras Claves</a></li>
            <li><a href="index.php?pag=general&opc=descripcion" <?php if($opcion == "descripcion"){ echo("class='selected'"); } ?>>Descripci&oacute;n</a></li>
            <li><a href="index.php?pag=general&opc=banner" <?php if($opcion == "banner"){ echo("class='selected'"); } ?>>Banner</a></li>
            <li><a href="index.php?pag=general&opc=redes" <?php if($opcion == "redes"){ echo("class='selected'"); } ?>>Redes Sociales</a></li>
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