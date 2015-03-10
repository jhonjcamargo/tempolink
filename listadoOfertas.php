<?php 
require_once("DAO/Oferta.php");
require_once("DAO/Categorias.php");
require_once("DAO/Cargos.php");

if(isset($_GET["cargo"])){
	
$cargo = Cargos::cargar($_GET["cargo"]);
$ofertas = Oferta::cargarXcargo($_GET["cargo"]);
$numOfertas = count($ofertas);
?>
<h3>Listado de ofertas: <?php echo($cargo->getNombre()); ?></h3>
<div class="homeText">
	<?php if($numOfertas != 0){ ?>
	<ul id="listadoOfertas">
    	<?php for($i  = 0; $i < $numOfertas; $i++) { ?>
    	<li>
        	<div id="itemOferta">
                <span class="cargo">
                	<?php echo(trim($ofertas[$i]->getTitulo())); ?>
                </span>
                <p class="empresa"><?php echo(substr($ofertas[$i]->getDesc(), 0 , 150)); ?>...</p>
                <a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>">Ver mas</a>
            </div>
        </li>
    	<?php  }?>
    </ul>
    <?php }
	else {?>
    	NO EXISTEN OFERTAS LABORALES ACTUALMENTE.
    <?php } ?>
</div>
<?php }
else{ 
$ofertas = Oferta::listado();
$numOfertas = count($ofertas);
?>
<h3>Listado de ofertas</h3>
<div class="homeText">
	<?php if($numOfertas != 0){ ?>
	<ul id="listadoOfertas">
    	<?php for($i  = 0; $i < $numOfertas; $i++) { ?>
    	<li>
        	<div id="itemOferta">
                <span class="cargo">
                	<?php echo(trim($ofertas[$i]->getTitulo())); ?>
                </span>
                <p class="empresa"><?php echo(substr($ofertas[$i]->getDesc(), 0 , 150)); ?>...</p>
                <a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>">Ver mas</a>
            </div>
        </li>
    	<?php  }?>
    </ul>
    <?php }
	else {?>
    	NO EXISTEN OFERTAS LABORALES ACTUALMENTE.
    <?php } ?>
</div>

<?php } ?>