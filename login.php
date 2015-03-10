<?php
session_start();
require_once("DAO/UsuarioRegistrado.php");
$error = "";

if( isset($_POST['txtUser']) ) {
    try {
        $usuario = UsuarioRegistrado::cargarXLogin( $_POST["txtUser"] );
        if( strcmp( $usuario->getPass(), md5($_POST["txtPass"] )) == 0 ) {
			if($usuario->getActivo() == 'A'){
				session_start();
            	$_SESSION['usuarioTempo'] = $usuario;
				$_SESSION['idUsuario'] = $usuario->getId();
				echo('<script>document.location.href = "index.php?pag=bienvenido"</script>');
		
			}
			else{
				$error = "Lo sentimos para si perfil aun no ha sido aprobado.";	
			}
        }
        else {
			
            $error = "La contrase&ntilde;a digitada no es correcta.";
        }
    }
    catch (MySQLException $e ){
        $error = "El usuario no esta registrado, verifique sus datos e intentelo nuevamente.";
    }
}

?>
<div class="homeText">
Para acceder a los diferentes servicios que ofrece TempoLink usted debe haber iniciado una sesi&oacute;n. Si no esta registrado registrase <a href="index.php?pag=registro">aqu&iacute;</a><br /><br />
<form name="frmLogin" id="frmLogin" method="post" action="index.php?pag=login">
<table width="100%">
	<tr>
    	<td align="center">
            <table id="tablaGen" style="width:400px; margin:auto 0;" align="center">
                <tr>
                    <td class="item" colspan="2" align="center"><h3>Ingresar a mi cuenta</h3></td>
                </tr>
                <tr>
                    <td class="item">Usuario:</td>
                    <td><input type="text" name="txtUser" id="txtUser" class="input" style="width:200px;"/></td>
                </tr>
                <tr>
                    <td class="item">Contrase&ntilde;a:</td>
                    <td><input type="password" name="txtPass" id="txtPass" class="input" style="width:200px;"/></td>
                </tr>
                <?php if($error != ""){ ?>
                <tr>
                    <td colspan="2" class="item" align="center"><strong><?php echo($error); ?></strong></td>
                </tr>
                <?php } ?>
                <tr>
                    <td class="item" align="right" colspan="2"><input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Ingresar" /></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>
</div>
</div>
