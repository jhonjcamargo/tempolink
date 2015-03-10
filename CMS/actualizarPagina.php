<?php

require_once("../DAO/Pagina.php");

try{
    if( $_POST["id"] != 0 ){
        $pagina = Pagina::cargar($_POST["id"]);
        $pagina->setNombre( htmlentities( $_POST["nombre"], ENT_QUOTES, "UTF-8") );
		$pagina->setContenido($_POST["texto"]);
    }
    else {	
        $pagina = Pagina::insertar(htmlentities( $_POST["nombre"], ENT_QUOTES, "UTF-8"), $_POST["padre"], $_POST["texto"]);
    }
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("P&aacute;gina <?php echo(( $_POST["id"] != 0 )?"actualizada":"ingresada"); ?>", "La p&aacute;gina fue <?php echo(( $_POST["id"] != 0 )?"actualizada":"ingresada"); ?> con &eacute;xito", 'index.php?pag=paginas&opc=listadoPaginas&padre=<?php echo($_POST["padre"]); ?>');
</script>