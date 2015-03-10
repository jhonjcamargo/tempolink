<?php

require_once("../DAO/Oferta.php");

if( $_POST["id"] != 0 ){
    $oferta = Oferta::cargar($_POST["id"]);
    $oferta->setTitulo( $_POST["titulo"]);
    $oferta->setDesc( $_POST["descripcion"] );
	$oferta->setCargo($_POST["cboCargo"]);
    $oferta->setDestacado( $_POST["cboDestacado"] );
	if( isset($_FILES["thumb"]) && $_FILES["thumb"]["name"] != ""){
		move_uploaded_file($_FILES["thumb"]["tmp_name"], "../images/ofertas/".$_FILES["thumb"]["name"]);
		$oferta->setThumb($_FILES["thumb"]["name"]);
	}
}
else{
	if( isset($_FILES["thumb"]) && $_FILES["thumb"]["name"] != ""){
		move_uploaded_file($_FILES["thumb"]["tmp_name"], "../images/ofertas/".$_FILES["thumb"]["name"]);
		$thumOf = $_FILES["thumb"]["name"];
	}
	else{$thumOf = '';}
	
    Oferta::insertar( $_POST["titulo"], $_POST["descripcion"],$thumOf, $_POST["cboCargo"], $_POST["cboDestacado"]);
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Oferta laboral <?php echo(($_POST["id"])?"actualizada":"insertada"); ?>", "La oferta laboral fue <?php echo(($_POST["id"])?"actualizada":"insertada"); ?> con &eacute;xito", 'index.php?pag=procesos&opc=listadoOfertas');
</script>