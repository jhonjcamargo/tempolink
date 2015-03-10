<?php
require_once("DAO/Pagina.php");
$pagina = Pagina::cargar($_GET['id']);
?>
<h3><?php echo ($pagina->getNombre()); ?></h3>
<div class="homeText">
    <?php echo $pagina->getContenido();?>
</div>