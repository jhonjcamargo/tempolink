<?php

require_once("../DAO/UsuarioRegistrado.php");

try{
    UsuarioRegistrado::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Usuario eliminado", "El usuario fue eliminado con &eacute;xito", 'index.php?pag=paginas&opc=listadoInscritos');
</script>