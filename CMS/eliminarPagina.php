<?php

require_once("../DAO/Pagina.php");

try{
    Pagina::eliminar( $_GET["id"] );
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    mostrarMensaje("P&aacute;gina eliminada", "La p&aacute;gina fue eliminada con &eacute;xito", 'index.php?pag=paginas&opc=listadoPaginas&padre=<?php echo($_GET["padre"]); ?>');
</script>