<?php

require_once("../DAO/Cargos.php");

if( $_POST["id"] != 0 ){
    $cargo = Cargos::cargar($_POST["id"]);
    $cargo->setNombre( $_POST["nombre"]);
	$cargo->setCategoria( $_POST["cboCategoria"]);
}
else{
    Cargos::insertar( $_POST["nombre"], $_POST["cboCategoria"]);
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Cargo <?php echo(($_POST["id"])?"actualizado":"insertado"); ?>", "El cargo fue <?php echo(($_POST["id"])?"actualizado":"insertado"); ?> con &eacute;xito", 'index.php?pag=procesos&opc=listadoCargos');
</script>