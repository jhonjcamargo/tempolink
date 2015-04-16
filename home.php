<?php  
require_once("DAO/Oferta.php");
require_once("DAO/Cargos.php");
$ofertas = Oferta::cargarXdestacado();
$numOfertas = count($ofertas);
?>
<style>
<!--
/***  scrolbar  de ofertas********************************************/


@import url(http://fonts.googleapis.com/css?family=Lobster+Two:700italic,700);
@import url(http://fonts.googleapis.com/css?family=Oswald:300);

.ofertas .ofert-cont{
	float: left;
	width: 100%;
	height: 400px;
	color:#ddd;
	text-align:left;
	font-size:13px;

}

.ofertas #ofert-sub.ofert-cont{ background-color: #333; }

/*.ofertas #ofert-sub.ofert-cont h2{ color: #ddd; }*/

.callbacks, .callbacks + p, #examples, .ofert-cont, .disable-destroy, .show-hide, .dialog, .all-themes-switch, .scrollTo{ -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }

.ofert-cont{
	overflow: auto;
	position: relative;
	padding: 13px;
	background: #333;
	margin: 10px;
	width: 740px;
	max-width: 97%;
	height: 400px;
	-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;
}

.ofert-cont b{
	color: #fff;
}

.ofert-cont a{
	color: #666  ;
	text-decoration:none;
}

.ofert-cont hr{
	margin-bottom: -10px;
	border-top: 1px solid rgba(0,0,0,0.7);
	background-color: transparent;
	height: 0;
	border: none;
	border-bottom: 1px solid rgba(255,255,255,0.08);
	border-top: 1px solid rgba(0,0,0,0.9);
	margin: 0;
	clear: both;
}

.ofert-cont p{ 
	margin: 5px 0; 
  	font-size: 15px;
}

.ofert-cont h2{
	font-family: "Oswald", sans-serif;
	font-weight: 300;
	font-style: normal;
	text-align:center;
	color:#A72626;
	text-transform: uppercase;
}

/**************************************fin scrolbar*****************************/
-->
</style>
<div class="contenidob">
	<div class="ofertas">
		<div id="ofert-sub" class="ofert-cont">
		    <h2>Ofertas laborales destacadas</h2>
		   	<?php for($i = 0; $i < $numOfertas; $i++ ){
		   		//if ($ofertas[$i]->getCategoria())
				//$cargo = Cargos::cargar($ofertas[$i]->getCargo());
			?>
		    	<p><b><?php echo utf8_encode($ofertas[$i]->getTitulo()); ?>:  </b>
		    		<a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>"><?php echo(substr(utf8_encode($ofertas[$i]->getDesc()), 0 , 150)); ?>...</a>
		    	</p>
		        <hr />
		  	<?php } ?>
		    </ul>
		</div>
	</div>
</div>		