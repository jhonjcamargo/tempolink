<?php

require_once("../DAO/Cliente.php");

try{
	$cliente = Cliente::cargar($_GET["id"]);
    Cliente::eliminar( $_GET["id"] );
	unlink("../clientes/".$cliente->getThumb());
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Cliente eliminado", "Cliente fue eliminada con &eacute;xito", 'index.php?pag=paginas&opc=listadoClientes');
</script>