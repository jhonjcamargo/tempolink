<?php

require_once("../DAO/Categorias.php");

try{
	$categorias = Categorias::cargar($_GET["id"]);
    Categorias::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Categoria eliminada", "La categoria fue eliminada con &eacute;xito", 'index.php?pag=procesos&opc=listadoCatCargos');
</script>