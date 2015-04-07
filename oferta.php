<?php 
require_once("DAO/Oferta.php");
require_once("DAO/Cargos.php");
$ofertas = Oferta::cargar($_GET["id"]);
$cargos =  Cargos::cargar($ofertas->getCargo());
?>
<h3>Oferta laboral: <?php echo utf8_encode($ofertas->getTitulo()); ?></h3>
<div class="homeText">
	<div style="color:#000; font-weight:bold;">CARGO: '<?php echo utf8_encode($cargos->getNombre()); ?>'</div><br />
    <?php echo utf8_encode($ofertas->getDesc()); ?>
    <img src="images/ofertas/<?php echo($ofertas->getThumb()); ?>" alt="TempoLink" />
    <?php if( isset($_SESSION["usuarioTempo"]) ){?> 
    	<br /><a href="index.php?pag=postulacion&idO=<?php echo($ofertas->getId()); ?>&idU=<?php echo($_SESSION['idUsuario']); ?>">Postularme a esta oferta.</a>
	<?php }?>
</div>