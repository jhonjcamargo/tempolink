<?php 
require_once("DAO/Configuracion.php");
$banner	= Configuracion::cargar(Configuracion::BANNER);
?>

<?php if ($pagina =="home"){?> 
	<div id="pics">
    	<img src="images/slide/rotador8.png" alt="TempoLink" /> 
    	<img src="images/slide/rotador9.png" alt="TempoLink" />
    	<img src="images/slide/rotador10.png" alt="TempoLink" />
    </div>
<?php }?>    