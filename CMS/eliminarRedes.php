<?php

require_once("../DAO/Redes.php");

try{
	$redes = Redes::cargar($_GET["id"]);
    Redes::eliminar( $_GET["id"] );
	unlink("../images/redes/".$redes->getThumb());
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Red social eliminada", "La red social fue eliminada con &eacute;xito", 'index.php?pag=general&opc=redes');
</script>