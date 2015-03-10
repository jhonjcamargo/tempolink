<?php

require_once("../DAO/Oferta.php");

try{
    Oferta::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("Oferta eliminada", "La oferta fue eliminada con &eacute;xito", 'index.php?pag=paginas&opc=listadoOfertas');
</script>