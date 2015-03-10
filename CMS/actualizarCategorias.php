<?php

require_once("../DAO/Categorias.php");

if( $_POST["id"] != 0 ){
    $redes = Categorias::cargar($_POST["id"]);
    $redes->setNombre( $_POST["nombre"]);
}
else{
    Categorias::insertar( $_POST["nombre"]);
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Categoria <?php echo(($_POST["id"])?"actualizada":"insertada"); ?>", "La categoria fue <?php echo(($_POST["id"])?"actualizada":"insertada"); ?> con &eacute;xito", 'index.php?pag=procesos&opc=listadoCatCargos');
</script>