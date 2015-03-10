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
<?php 
if(isset($_GET['msg']) && trim($_GET['msg']) == 'error'){
	?> <script>mostrarMensaje("Error en datos","Verifique sus datos e intente nuevamente","");</script> 
<?php } ?>
<iframe name="iframeOculto" width="0" height="0" style="border: 0px"></iframe>
<div id="wrap">
    <div id="site">
        <div id="container">
            <div id="navigation_login">
            </div>
            <ul id="content">
                <li class="left">
                    <div id="boxes_inner">
                        <div class="box_left">
                            <span class="center"></span>
                            <span class="bottom">&nbsp;</span>
                        </div>
                        <div class="box_right">
                            <span class="center">
                                <div class="text_inner">
                                    <h3>Olvido su contrase&ntilde;a ?</h3>
                                  Por favor, digite su nombre de usuario cedula y/o nit dependiento el tipo de perfil, de esta manera sera enviada una contrase&ntilde;a temporal a su correo electronico. No olvide cambiar su contrase&ntilde;a despues de este proceso.
                                    <br />
                                </div>
                                <div id="clear">
                                    <div id="form">
                                        <form name="formLogin" id="formLogin" action="sendPass.php" method="post" >
                                            <label>Usuario:<br /><input name="user" id="user" type="text" class="input" autocomplete="off" /></label>
                                            <br />
                                            <label>Cedula y/o NIT:<br /><input name="doc" id="doc" type="text" class="input" autocomplete="off"/></label>
                                            <br />
                                            <label>Perfil:</label><br />
                                            <select id="cboTipo" name="cboTipo" class="select_" style="margin:0;">
                                                <option value="">:: Seleccione Perfil ::</option>
                                                <option value="0">Empleado</option>
                                                <option value="1">Empresa</option>
                                            </select>
                                            <br />
                                            <input type="submit" class="button" name="ingresar" id="ingresar" value="Ingresar" />
                                        </form>
                                    </div>
                                    <br />
                                </div>
                            </span>
                            <span class="bottom">&nbsp;</span>
                        </div>
                    </div>
                </li>
            </ul>
            <div id="footer"><?php include("footer.php"); ?></div>
        </div><!-- container -->            
    </div>
</div>
</body>
</html>