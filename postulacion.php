<?php 
if( !isset($_SESSION["usuario"]) ){
	echo('<script>document.location.href = "index.php?pag=login"</script>');
}
else{
require_once("DAO/Postulacion.php");
if(isset($_GET["idU"]) && isset($_GET["idO"])){
	$postulacion = Postulacion::cargar($_GET["idU"], $_GET["idO"]);
	if($postulacion == false){
		Postulacion::insertar($_GET["idU"], $_GET["idO"]);
		$error = true;	
	}
	else{
		$error = false;	
	}
}
?>
<h3><?php if($error == true){ echo("Su postulacion se ha registrado");} else if($error == false){echo("Ha ocurrido un error");} ?></h3>
<div class="homeText">
<?php if($error == true){ 
	echo("Hemos registrado su postulacion exitosamente, en las proximas horas un asesor de TempoLink lo estara contactando.");} 
else if($error == false){echo("Lo sentimos, usted ya se postulo a esta oferta laboral.");} 
?>
</div>
<?php } ?>