<?php 
require_once("DAO/Configuracion.php");
$banner			= Configuracion::cargar(Configuracion::BANNER);
?>

<?php if ($pagina =="home"){?> 
<div id="banner">	
	<div id="pics">
        <img src="images/slide/11.jpg" alt="TempoLink" />
    	<img src="images/slide/12.jpg" alt="TempoLink" />
    	<img src="images/slide/13.jpg" alt="TempoLink" />
    	<img src="images/slide/14.jpg" alt="TempoLink" />
    	<img src="images/slide/15.jpg" alt="TempoLink" />
    	<img src="images/slide/16.jpg" alt="TempoLink" />
	</div>
    <div id="thumbs">
    	<h1>LIDERES EN ADMINISTRACÍON INTEGRAL DEL TALENTO HUMANO</h1>
    </div>
 </div>   
	<a href="admin/index.php" class="empleados" target="_blank"></a>
	<a href="admin/index.php" class="empresas" target="_blank"></a>
<!-- <ul class="tabsPasos">
    <li><a href="index.php?pag=registro"><img src="images/registrate.png" /></a></li>
    <li><a href="index.php?pag=perfil"><img src="images/carga.png" /></a></li>
    <li class="post"><a href="index.php?pag=listadoOfertas"><img src="images/postulate.png" /></a></li>
</ul> -->
<?php }?>    