<?php

require_once("../DAO/Redes.php");

if( $_POST["id"] != 0 ){
    $redes = Redes::cargar($_POST["id"]);
    $redes->setNombre( $_POST["nombre"]);
    $redes->setLink( $_POST["link"] );
	if( isset($_FILES["thumb"]) && $_FILES["thumb"]["name"] != ""){
		move_uploaded_file($_FILES["thumb"]["tmp_name"], "../images/redes/".$_FILES["thumb"]["name"]);
		$redes->setThumb($_FILES["thumb"]["name"]);
	}
}
else{
	if( isset($_FILES["thumb"]) && $_FILES["thumb"]["name"] != ""){
		move_uploaded_file($_FILES["thumb"]["tmp_name"], "../images/redes/".$_FILES["thumb"]["name"]);
		$thumbRed = $_FILES["thumb"]["name"];
	}
	else{$thumbRed = '';}
	
    Redes::insertar( $_POST["nombre"], $_POST["link"],$thumbRed);
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Red social <?php echo(($_POST["id"])?"actualizada":"insertada"); ?>", "La red social fue <?php echo(($_POST["id"])?"actualizada":"insertada"); ?> con &eacute;xito", 'index.php?pag=general&opc=redes');
</script>