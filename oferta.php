<?php 
require_once("DAO/Oferta.php");
require_once("DAO/Cargos.php");
$ofertas = Oferta::cargar($_GET["id"]);
$cargos =  Cargos::cargar($ofertas->getCargo());
?>
<h3>Oferta laboral: <?php echo($ofertas->getTitulo()); ?></h3>
<div class="homeText">
	<div style="color:#000; font-weight:bold;">CARGO: '<?php echo($cargos->getNombre()); ?>'</div><br />
    <?php echo($ofertas->getDesc()); ?>
    <?php if( isset($_SESSION["usuarioTempo"]) ){?> 
    	<br /><a href="index.php?pag=postulacion&idO=<?php echo($ofertas->getId()); ?>&idU=<?php echo($_SESSION['idUsuario']); ?>">Postularme a esta oferta.</a>
	<?php }?>
</div>