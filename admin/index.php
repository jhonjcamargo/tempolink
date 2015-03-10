<?php
session_start();
require_once("../DAO/UsuarioTempo.php");
if( isset($_POST['user']) ) {
    try {
        $usuario = UsuarioTempo::cargarXLogin( $_POST["user"], $_POST["cboTipo"] );
        if( strcmp( $usuario->getContrasena(), md5($_POST["password"] )) == 0 ) {
            session_start();
            $_SESSION['usuarioAdmin'] = $usuario;
			if($usuario->getTipo() == 0){
				$_SESSION['tipo'] = 'empleado';	
				$_SESSION['id'] = $usuario->getId();
			}
			else if($usuario->getTipo() == 1){
				$_SESSION['tipo'] = 'empresa';
				$_SESSION['id'] = $usuario->getId();
			}
        }
        else {
            $error = true;
        }
    }
    catch (MySQLException $e ){
        $error = "Usuario no existe";
    }
}


if( !isset($_SESSION["usuarioAdmin"]) ){
   $start="login.php";
}
else $start="interna.php"
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="sIFR-hasFlash" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="Author" content="Carlos Torres C"/>
        <meta name="Description" content="CMS - TEMPOLINK"/>
        <meta name="Keywords" content="Contenidos, CMS, Administracion, "/>
        <title>TEMPOLINK</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="js/thickbox.css" rel="stylesheet" type="text/css" />
        <link href="mensaje.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
        <script type="text/javascript">
			$(document).ready(function() {
				$("#formLogin").validate({ 
					rules: {
						user: {
							required: true},
						password: {
							required: true},
						cboTipo:{
							required:true}
						},
					messages: {
						user: {
							required: "El nombre de usuario es requerido"},
						password: {
							required: "La contrase&ntilde;a es requerida"},
						cboTipo:{
							required:"El perfil es requerido"}
						}
				});
			
			});
		</script>
    </head>
    <body>
        <?php include("cuadroMensaje.php"); ?>
        <iframe name="iframeOculto" width="0" height="0" style="border: 0px"></iframe>
        <div id="wrap">
            <div id="site">
                <?php include($start); ?>
            </div>
        </div>
    </body>
</html>