<?php  
require_once("DAO/Oferta.php");
require_once("DAO/Cargos.php");
$ofertas = Oferta::cargarXdestacado();
$numOfertas = count($ofertas);
?><h2>Ofertas de laborales destacadas</h2>
<div class="homeItems">
    <ul id="listOfertas">
    	<?php for($i = 0; $i < $numOfertas; $i++ ){ 
			$cargo = Cargos::cargar($ofertas[$i]->getCargo());
		
		?>
        <li>
            <div id="oferta">
                <span class="cargo">
                	<a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>"><?php echo($ofertas[$i]->getTitulo()); ?></a>
                    <?php /*?><br />Cargo: <?php echo($cargo->getNombre());  ?><?php */?>
                </span>
                <p class="empresa"><?php echo(substr($ofertas[$i]->getDesc(), 0 , 150)); ?>...</p>
                <a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>" style="color:#008599;">Ver m&aacute;s</a>
            </div>
            <div id="logoEmp">
				<?php if($ofertas[$i]->getThumb() != ''){ ?>
                <img src="images/ofertas/<?php echo($ofertas[$i]->getThumb()); ?>" width="70" height="50"  />
				<?php } else{ ?>
                <img src="images/logo-ofertas.png" width="70" height="50"  />
				<?php } ?>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>