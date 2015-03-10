<?php
require_once("DAO/InfoAcademica.php");

try{
    InfoAcademica::eliminar($_GET["id"]);
}catch (MySQLException $e){
    echo($e->getMessage()."<br />");
    echo($e->getFile()."<br />");
    echo($e->getLine()."<br />");
    echo($e->getConsulta()."<br />");
}

?>
<script type="text/javascript">
    document.location.href = "index.php?pag=perfil";
</script>