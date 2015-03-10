<?php 
require_once("../DAO/UsuarioTempo.php");

if( isset($_POST['user']) ) {
    
	try {
		$usuario = UsuarioTempo::cargarXLogin( $_POST["user"], $_POST["cboTipo"] );
		if( $usuario->getDoc() == $_POST["doc"] ) {
			$destinatario = $usuario->getEmail();
			$asunto = "Recordar contrase&ntilde;a acceso TempoLink.com";
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
				<td class="cellGen">Recordatorio de contrase&ntilde;a</td>
			  </tr>
			  <tr>
				<td class="cellGen">
				  <table width="500" border="0" id="tablaInfo">
				  <tr>
					<td class="cellInfo"><strong>Nombre</strong></td>
					<td class="cellInfo">'.$usuario->getNombre().'</td>
				  </tr>
				  <tr>
					<td class="cellInfo"><strong>Cedula y/o Nit</strong></td>
					<td class="cellInfo">'.$usuario->getDoc().'</td>
				  </tr>
				  <tr>
					<td class="cellInfo"><strong>Usuario</strong></td>
					<td class="cellInfo">'.$usuario->getLogin().'</td>
				  </tr>
				  <tr>
					<td class="cellInfo"><strong>Contrase&ntilde;a</strong></td>
					<td class="cellInfo">'.$usuario->getContrasena().'</td>
				  </tr>
				</table>
				 </td>
			  </tr>
			</table>
			</body>
			</html>		
			';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			
			$headers .= "From: noreply@tempolink.com.co\r\n";
			
			mail($destinatario,$asunto,$cuerpo,$headers);
			
			
		}
	}
	 catch (MySQLException $e ){
       echo('<script type="text/javascript">document.location.href="recordarPass.php?msg=error"</script>');
    }
	
}
else{
//	echo('<script type="text/javascript">document.location.href="index.php"</script>');
}

?>