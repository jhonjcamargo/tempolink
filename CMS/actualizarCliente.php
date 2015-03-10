<?php

require_once("../DAO/Cliente.php");

if( $_POST["id"] != 0 ){
    $cliente = Cliente::cargar($_POST["id"]);
    $cliente->setCliente( $_POST["cliente"]);
    $cliente->setOrden( $_POST["orden"] );
	if( isset($_FILES["thumbC"]) && $_FILES["thumbC"]["name"] != ""){
		move_uploaded_file($_FILES["thumbC"]["tmp_name"], "../clientes/".$_FILES["thumbC"]["name"]);
		$cliente->setThumb($_FILES["thumbC"]["name"]);
	}
}
else{
	if( isset($_FILES["thumbC"]) && $_FILES["thumbC"]["name"] != ""){
		move_uploaded_file($_FILES["thumbC"]["tmp_name"], "../clientes/".$_FILES["thumbC"]["name"]);
		$thumbCliente = $_FILES["thumbC"]["name"];
	}
	else{$thumbCliente = '';}
	
    Cliente::insertar( $_POST["orden"], $_POST["cliente"],$thumbCliente);
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Cliente <?php echo(($_POST["id"])?"actualizado":"insertado"); ?>", "El cliente fue <?php echo(($_POST["id"])?"actualizado":"insertado"); ?> con &eacute;xito", 'index.php?pag=paginas&opc=listadoClientes');
</script>