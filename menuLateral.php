<?php
require_once("DAO/Pagina.php");
require_once("DAO/Categorias.php");
require_once("DAO/Cargos.php");
require_once("DAO/Oferta.php");

$categorias = Categorias::listado();
$numCategorias = count($categorias);
?>

<?php if($pagina == 'home' || $pagina == 'oferta' || $pagina == 'listadoOfertas'){ ?>
<h2>Ofertas de laborales por categoria y &aacute;rea</h2>
<div class="menuItems">
    <?php 
    for($i = 0; $i < $numCategorias; $i++){
        $cargos = Cargos::cargarXcategoria($categorias[$i]->getId());
        $numCargos = count($cargos);
        ?>
        <div id="CollapsiblePanel<?php echo($i+1); ?>" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0"><?php echo($categorias[$i]->getNombre()); ?></div>
        <div class="CollapsiblePanelContent">
          <ul id="menuLateral">
          	  <?php for($j = 0; $j < $numCargos; $j++){ 
			  	$ofertas = Oferta::cargarXcargo($cargos[$j]->getId());
				$numOfertas = count($ofertas);
			  ?>
              	<li><a href="index.php?pag=listadoOfertas&cargo=<?php echo($cargos[$j]->getId()); ?>"><?php echo($cargos[$j]->getNombre()); ?> (<?php echo($numOfertas); ?>)</a></li>
              <?php } ?>
          </ul>
      </div>
      </div>
    <?php } ?>        
</div>    
<?php 
}
else{
	
$id = "1";
if( isset($_GET['id']) && $_GET['id'] != "" ){
    $id = $_GET["id"];
}
$paginaActual = Pagina::cargar($id);
$hijas = $paginaActual->getHijos();
if(count($hijas) == 0 ){//No tiene hijos entonces traigo los hermanos
    if(Pagina::getPadreXId($_GET["id"]) != null){
        $padre = Pagina::cargar( Pagina::getPadreXId($_GET["id"]) );
        $hijas = $padre->getHijos();
    }
}

?>
<div class="menuINav">
<ul id="menuInner">
<?php if(isset ($_GET["id"]) && $_GET['id'] != ""){ ?>
<?php foreach ($hijas as $hija) { ?>
    <li><a href="index.php?pag=pagina&id=<?php echo($hija->getId()); ?>&padre=<?php echo($_GET["padre"]) ?>"><?php echo($hija->getNombre()); ?></a></li>
<?php }
}
else{?>
    <li><a href="index.php?pag=pagina&id=1&padre=1">Quienes Somos</a></li>
    <li><a href="index.php?pag=pagina&id=5&padre=5">Productos y servicios</a></li>
    <li><a href="index.php?pag=empresas">Empresas</a></li>
    <li><a href="index.php?pag=contacto">Cont&aacute;ctenos</a></li>
<?php } ?>
</ul>
</div>     
<?php
}
?>

<script type="text/javascript">
<?php 
	for($i = 0; $i < $numCategorias; $i++){?>
		var CollapsiblePanel<?php echo($i+1) ?> = new Spry.Widget.CollapsiblePanel("CollapsiblePanel<?php echo($i+1) ?>", {contentIsOpen:false});
<?php } ?>
</script>
