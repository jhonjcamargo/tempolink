<?php

require_once("../DAO/UsuarioTempo.php");

try{
    UsuarioTempo::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Usuario eliminado", "el Usuario fue eliminada con &eacute;xito", 'index.php?pag=usuarios&opc=listadoTempo');
</script>