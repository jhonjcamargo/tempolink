<?php 
require_once("DAO/Configuracion.php");
$banner	= Configuracion::cargar(Configuracion::BANNER);
?>

<?php if ($pagina =="home"){?> 
	<div id="pics">
    	<img src="images/slide/5.jpg" alt="TempoLink" />
    	<img src="images/slide/11.jpg" alt="TempoLink" />
    	<img src="images/slide/13.jpg" alt="TempoLink" /> 
    	<img src="images/slide/14.jpg" alt="TempoLink" />
    </div>
<?php }?>    