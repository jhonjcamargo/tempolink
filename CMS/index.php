<?php
session_start();
require_once("../DAO/Usuario.php");
if( isset($_POST['user']) ) {
    try {
        $usuario = Usuario::cargarXLogin( $_POST["user"] );
        if( strcmp( $usuario->getContrasena(), md5($_POST["password"] )) == 0 ) {
            session_start();
            $_SESSION['usuario'] = $usuario;
        }
        else {
            $error = true;
        }
    }
    catch (MySQLException $e ){
        $error = "Usuario no existe";
    }
}


if( !isset($_SESSION["usuario"]) ){
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
        <title>CMS - TEMPOLINK</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="js/thickbox.css" rel="stylesheet" type="text/css" />
        <link href="mensaje.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
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