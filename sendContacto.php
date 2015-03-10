<style>
	body{
		background-color:#F4F4F6;
		font-family: "Calibri",Arial,Helvetica,Geneva,sans-serif;
	}
	#tablaGen{border-collapse: collapse; border:1px solid #D8D8DA; font-size: 12px;}
	#tablaGen .cellGen{background: none repeat scroll 0 0 #E3E4E7; border-bottom: 1px solid #D8D8DA; padding: 5px 5px;}
	#tablaInfo{border-collapse: collapse; font-size: 12px; margin:10px;}
	#tablaInfo .cellInfo{background: none repeat scroll 0 0 #E3E4E7; border: 1px solid #D8D8DA; padding: 5px 5px;}
	h5{color: #333333; font-size: 24px;}
</style>
<?
$destinatario = "c.dreadcat@gmail.com";
$asunto = "Contacto TempoLink.com";
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
<html>
<body>
<table width="500" border="0" align="center" id="tablaGen">
  <tr>
  	<td class="cellGen"><img src="http://www.agathagroup.com.co/tempoLink/images/tempoLinkMail.png"></td>
  </tr>
  <tr>
    <td class="cellGen">Se ha recibio un contacto desde TempoLink.com<br>
    Asunto: '.$asunto.'</td>
  </tr>
  <tr>
    <td class="cellGen">
      <table width="500" border="0" id="tablaInfo">
	  <tr>
		<td class="cellInfo"><strong>Nombre</strong></td>
		<td class="cellInfo">'.$_POST["txtNom"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Apellido</strong></td>
		<td class="cellInfo">'.$_POST["txtApe"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Direcci&oacute;n</strong></td>
		<td class="cellInfo">'.$_POST["txtDir"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Pa&iacute;s</strong></td>
		<td class="cellInfo">'.$_POST["txtPais"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Ciudad</strong></td>
		<td class="cellInfo">'.$_POST["txtCiudad"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Tel&eacute;fono</strong></td>
		<td class="cellInfo">'.$_POST["txtTfno"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>E-Mail</strong></td>
		<td class="cellInfo">'.$_POST["txtEmail"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Asunto</strong></td>
		<td class="cellInfo">'.$_POST["txtAsunto"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Comentarios</strong></td>
		<td class="cellInfo">'.$_POST["txtComent"].'</td>
	  </tr>
	  <tr>
		<td class="cellInfo"><strong>Fecha de contacto</strong></td>
		<td class="cellInfo">'.date(Y).'/'.date(m).'/'.date(d).'</td>
	  </tr>
	</table>
	 </td>
  </tr>
</table>
</body>
</html>
';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: noreply@tempolink.com.co\r\n";

//Direcciones que recibián copia
//$headers .= "Cc: ejemplo@ejemplo.com\r\n";

//Direcciones que recibirán copia oculta
//$headers .= "Bcc: ejemplo@ejemplo.com\r\n";


try{
	mail($destinatario,$asunto,$cuerpo,$headers);
	header('Location: /http://www.agathagroup.com.co/tempoLink/index.php?pag=contacto&msg='.$_POST["txtNom"]);
}
catch(Exception $e){
	echo($e);
}
?> 