<?php

require_once("../DAO/Cargos.php");

try{
	$cargo = Cargos::cargar($_GET["id"]);
    Cargos::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Cargo eliminado", "El cargo fue eliminada con &eacute;xito", 'index.php?pag=procesos&opc=listadoCargos');
</script>