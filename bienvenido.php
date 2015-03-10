<?php
if( !isset($_SESSION["usuarioTempo"]) ){
	echo('<script>document.location.href = "index.php?pag=login"</script>');
}
else {
?>
<h3>Bienvenido a TempoLink</h3>
<div class="homeText">
    A partir de este momento usted puede descubrir los diferentes servicios que ofrece tempolink.<br /><br />
    Al finalizar no olvide cerrar su sesion.
</div>	
<?php } ?>