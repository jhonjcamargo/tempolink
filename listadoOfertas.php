<style>
.cont-ofertas{	
	padding:20px;
	width:auto;
	min-height:320px;
	color:#999;
	overflow:hidden;
	border-radius:8px;
}


.cont-buscador{
	padding:3px;
	margin:3px;
	height:700px;
	float:left;
	width:225px;
	
	}
.buscador-txt{
  padding: 3px;
  margin: 55px 0px;
  height: 350px;
  float: left;
  width: 200px;
  border-radius: 8px;
  border: 1px solid #ccc;

	}
.buscador-logo{
	padding:3px;
	margin:-18px 35px;
	height:120px;
	width:146px;
	
	}
	
.cont-listado{
	width:690px;
	float:left;
	margin:3px;
	padding:5px;
	font-size:14px;
	}

.cont-elemento{
	width:90%;
	float:left;
	margin:0 5%;
	padding: 1px 5px;	
	border-bottom: 1px solid #ccc;
	color:#333;
	}
.elemento-encab{
	width:90%;
	float:left;
	height:25px !important;
	margin: 0 5%;
	font-size:12px !important;
	padding: 7px;
	font-weight:bold;	
	color: #EFECEC !important;
    background: #A72626;
	box-shadow: 3px 2px 5px #666666 ;
	}
.ele-fecha{
	float:left;
	margin: 2px;
	padding:3px;
	width:15%;
	text-align:center;
    font-size: 13px;
	height:46px;
	}

.ele-cat{
	float:left;
	margin:2px;
	padding:3px;
	color:#A72626;
	width:20%;
	height:46px;
	font-weight:bold;
	}

.ele-desc{
	float:left;
	text-align:left;
	font-size:13px;
	margin:2px;
	padding:3px;
	width:45%;
	height:46px;
	
	}

.ele-desc a{
	color:#333;
	text-decoration:none;
	}
	
.ele-desc span{
	font-weight:bold;
	color:#A72626;
	text-decoration:none;
	
	}

.ele-emp{
	float:left;
	margin:2px;
	padding:3px;
	width:108px;
	height:10%;
	font-weight:bold;
	color:#A72626;
	}

</style>
<?php 
require_once("DAO/Oferta.php");
require_once("DAO/Categorias.php");
require_once("DAO/Cargos.php");

if(isset($_GET["cargo"])){
	
$cargo = Cargos::cargar($_GET["cargo"]);
$cargos = Cargos::listado();
$ofertas = Oferta::cargarXcargo($_GET["cargo"]);
$numOfertas = count($ofertas);
?>

<h3>Resultado filtro de ofertas: <?php echo utf8_encode($cargo->getNombre()); ?></h3>
<div>
	<p>Filtrar:</p>
	<select>
		<?php foreach ($cargos as $c){?>
			<option> <?php echo utf8_encode($c->getNombre())?></option>
		<?php }?>	
	</select>
</div> 
 
<div class="elemento-encab">
	<div class="ele-fecha">Nombre</div>
	<div class="ele-cat" style="color:#EFECEC">Categoria</div>
	<div class="ele-desc"><center>Descripción</center></div>
	<div class="ele-emp" style="color:#EFECEC">Imagen</div>
</div>
	<?php if($numOfertas != 0){ ?>
    	<?php for($i  = 0; $i < $numOfertas; $i++) { ?>
    	<div id="itemOferta" class="cont-elemento">
                <div class="ele-fecha"><?php echo(trim(utf8_encode($ofertas[$i]->getTitulo()))); ?></div>
                <div class="ele-cat"><?php $cargoactual =  Cargos::cargar($ofertas[$i]->getCargo()); echo $cargoactual->getNombre() ?> </div>
                <div class="ele-desc"><?php echo(substr(utf8_encode($ofertas[$i]->getDesc()), 0 , 150)); ?>...
                	<a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>" style="color: #A72626;   font-weight: bold;">Ver mas</a>
                </div>
                <div class="ele-emp"> <img src="images/ofertas/<?php echo($ofertas[$i]->getThumb()); ?>" alt="TempoLink" /> </div>
     	</div>
    	<?php  }}else {?>
    	NO EXISTEN OFERTAS LABORALES ACTUALMENTE.
    <?php } ?>
<?php }else{ 
$ofertas = Oferta::listado();
$cargos = Cargos::listado();
$categorias = Categorias::listado();
$numOfertas = count($ofertas);
?>
<h3>Listado de ofertas</h3>
<p>Filtrar:</p>
<select>
	<?php foreach ($cargos as $c){?>
		<option> <?php echo utf8_encode($c->getNombre())?></option>
	<?php }?>	
</select>
 
<div class="elemento-encab">
 	<div class="ele-fecha">Nombre</div>
	<div class="ele-cat" style="color:#EFECEC">Categoria</div>
    <div class="ele-desc"><center>Descripción</center></div>
    <div class="ele-emp" style="color:#EFECEC">Imagen</div>
</div>
	<?php if($numOfertas != 0){ ?>
    	<?php for($i  = 0; $i < $numOfertas; $i++) { ?>
        	<div id="itemOferta" class="cont-elemento">
                <div class="ele-fecha"><?php echo(trim(utf8_encode($ofertas[$i]->getTitulo()))); ?></div>
                <div class="ele-cat"><?php $cargoactual =  Cargos::cargar($ofertas[$i]->getCargo()); echo $cargoactual->getNombre() ?> </div>
                <div class="ele-desc"><?php echo(substr(utf8_encode($ofertas[$i]->getDesc()), 0 , 150)); ?>...
                	<a href="index.php?pag=oferta&id=<?php echo($ofertas[$i]->getId()); ?>" style="color: #A72626;   font-weight: bold;">Ver mas</a>
                </div>
                <div class="ele-emp"> <img src="images/ofertas/<?php echo($ofertas[$i]->getThumb()); ?>" alt="TempoLink" /> </div>
            </div>
    	<?php  }}else {?>
    	NO EXISTEN OFERTAS LABORALES ACTUALMENTE.
    <?php }} ?>