<?php

require_once("../DAO/Configuracion.php");
$item = Configuracion::cargar($_POST["id"]);

switch ( $_POST["id"]){
	case Configuracion::FAVICON:
		if( isset($_FILES["favicon"]) && $_FILES["favicon"]["name"] != ""){
            move_uploaded_file($_FILES["favicon"]["tmp_name"], "../images/".$_FILES["favicon"]["name"]);
			$item->setValor($_FILES["favicon"]["name"]);
        }?>
		<script type="text/javascript">
		    parent.mostrarMensaje("Favicon actualizado", "Favicon actualizado con &eacute;xito", 'index.php?pag=general');
		</script><?php
        break;
	case Configuracion::TITULO:
        $item->setValor( htmlspecialchars( $_POST["titulo"], ENT_QUOTES, "UTF-8" ) );?>
		<script type="text/javascript">
		    parent.mostrarMensaje("Titulo actualizado", "T&iacute;tulo actualizado con &eacute;xito", 'index.php?pag=general');
		</script><?php
        break;
	case Configuracion::KEYWORDS:
        $item->setValor( htmlspecialchars( $_POST["claves"], ENT_QUOTES, "UTF-8" ) );?>
		<script type="text/javascript">
		    parent.mostrarMensaje("Claves actualizado", "Palabras claves actualizadas con &eacute;xito", 'index.php?pag=general');
		</script><?php
        break;
	case Configuracion::DESCRIPCION:
        $item->setValor( htmlspecialchars( $_POST["descripcion"], ENT_QUOTES, "UTF-8" ) );?>
		<script type="text/javascript">
		    parent.mostrarMensaje("Item actualizado", "Descripci&oacute;n actualizada con &eacute;xito", 'index.php?pag=general');
		</script><?php
        break;
	case Configuracion::BANNER:
		if( isset($_FILES["banner"]) && $_FILES["banner"]["name"] != ""){
            move_uploaded_file($_FILES["banner"]["tmp_name"], "../images/".$_FILES["banner"]["name"]);
			$item->setValor($_FILES["banner"]["name"]);
        }?>
		<script type="text/javascript">
		    parent.mostrarMensaje("Banner actualizado", "El banner se actualizo con &eacute;xito", 'index.php?pag=general');
		</script><?php
        break;
	
}?>