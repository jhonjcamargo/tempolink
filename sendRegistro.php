<?php
require_once("DAO/Conexion.php");
require_once("DAO/UsuarioRegistrado.php");

	$fecha = $_POST["cboAno"]."-".$_POST["cboMes"]."-".$_POST["cboDia"];
	$activo = 1;
	
    $ID = UsuarioRegistrado::insertar(
        htmlspecialchars($_POST["txtNombre"],ENT_QUOTES,"UTF-8"),
		htmlspecialchars($_POST["txtApellido"],ENT_QUOTES,"UTF-8"),
		$_POST["cboTipo"],
		$_POST["txtDocumento"],
		$fecha,
		$_POST["rdgGenero"],
		htmlspecialchars($_POST["txtCiudad"],ENT_QUOTES,"UTF-8"),
		htmlspecialchars($_POST["txtDireccion"],ENT_QUOTES,"UTF-8"),
		$_POST["txtTfno"],
		htmlspecialchars($_POST["txtPerfil"],ENT_QUOTES,"UTF-8"),
		$_POST["txtMail"],
		$_POST["txtUsuario"],
		md5($_POST["txtPass"])
    );
    /*
     * prueba de email de registro nuevo
     */
    
    $destinatario = "info@tempolink.com.co";
    $asunto = "Nuevo Registro";
    $cuerpo = '
<style>
*, body{
		background-color:#F4F4F6;
		font-family: "Calibri",Arial,Helvetica,Geneva,sans-serif;
	}
	#tablaGen{border-collapse: collapse; border:1px solid #D8D8DA; font-size: 12px;}
	#tablaGen .cellGen{background: none repeat scroll 0 0 #E3E4E7; border-bottom: 1px solid #D8D8DA; padding: 5px 5px;}
	#tablaInfo{border-collapse: collapse; font-size: 12px; margin:10px;}
	#tablaInfo .cellInfo{background: none repeat scroll 0 0 #E3E4E7; border: 1px solid #D8D8DA; padding: 5px 5px;}
	h5{color: #333333; font-size: 24px;}
</style>
<table width="500" border="0" align="center" id="tablaGen">
  <tr>
  	<td class="cellGen"><img src="http://www.tempolink.com.co/images/Tempolink_logo.png"></td>
  </tr>
  <tr>
    <td class="cellGen">Se ha recibio un nuevo registro en TempoLink.com<br>
    Asunto: '.$asunto.'</td>
  </tr>
  <tr>
    <td class="cellGen">
      <table width="500" border="0" id="tablaInfo">
	  <tr>
		<td class="cellInfo"><strong>Nombre</strong></td>
		<td class="cellInfo">'.$_POST["txtNombre"].' '.$_POST["txtApellido"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>E-Mail</strong></td>
		<td class="cellInfo">'.$_POST["txtMail"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Fecha de contacto</strong></td>
		<td class="cellInfo">'.date(Y).'/'.date(m).'/'.date(d).'</td>
	  </tr>
	</table>
	 </td>
  </tr>
</table>
';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    
    //dirección del remitente
    $headers .= "From: info@tempolink.com.co\r\n";
    
    mail($destinatario,$asunto,$cuerpo,$headers);
//     header('Location: http://www.tempolink.com.co/index.php?pag=confirmaRegistro');
    
?>
<script type="text/javascript">
	document.location.href = 'index.php?pag=confirmaRegistro';
</script>