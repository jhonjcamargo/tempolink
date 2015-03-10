<?php

require_once("../DAO/UsuarioRegistrado.php");

if( $_POST["id"] != 0 ){
    $usuario = UsuarioRegistrado::cargar($_POST["id"]);
	if($usuario->getActivo() == 'P' && $_POST["cboEstado"] == 'A'){
		
		$destinatario = $usuario->getEmail();
		$asunto = "Aprobacion de Perfil";
		$cuerpo = '
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
		<html>
		<body>
		<table width="538" border="0" align="center" id="tablaGen">
		  <tr>
			<td class="cellGen"><img src="http://www.agathagroup.com.co/tempoLink/images/tempoLinkMail.png"></td>
		  </tr>
		  <tr>
			<td class="cellGen"><p>&nbsp;</p>
			  <p>Apreciado Usuario, su perfil ha sido aprobado.</p>
			<p>A partir de este momento usted tiene acceso a nuestro sitio web, donde podra ver el listado completo de las ofertas laborales actuales, filtro por cargos y categorias y podra postularce a la oferta laboral que usted determine.</p>
			<p>Para tener acceso no olvide tener a mano el usuario y contrasena que usted determino en el registro.</p>
			<p>Agradecemos su espera.</p>
			<p>&nbsp;</p></td>
		  </tr>
		  <tr>
			<td class="cellGen"><div id="footer">
			  <div> <strong>© Copyright 2011</strong> Agatha Group| Bogotá - Colombia.<br>
				Carrera 4a Nro 26 - 42 Ofc 102. | PBX: (051) 562 2888 o escribanos a <a href="mailto:contacto@agathagroup.com">contacto@agathagroup.com</a></div>
			</div></td>
		  </tr>
		</table>
		</body>
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
		}
		catch(Exception $e){
			echo($e);
		}	
	}
    $usuario->setNombre( $_POST["nombre"]);
    $usuario->setApellido( $_POST["apellido"] );
    $usuario->setTipoDoc( $_POST["cboTipo"] );
    $usuario->setDocumento( $_POST["documento"] );
    $usuario->setNacimiento( $_POST["nacimiento"] );
    $usuario->setGenero( $_POST["rdgGenero"] );
    $usuario->setCiudad( $_POST["ciudad"] );
    $usuario->setDireccion( $_POST["direccion"] );
    $usuario->setTelefono( $_POST["tfno"] );
    $usuario->setPerfil( $_POST["perfil"] );
    $usuario->setEmail( $_POST["email"] );
    $usuario->setActivo( $_POST["cboEstado"] );
}
?>
<script type="text/javascript">
  parent.mostrarMensaje("Usuario <?php echo(($_POST["id"])?"actualizado":"insertado"); ?>", "El usuario fue <?php echo(($_POST["id"])?"actualizado":"insertado"); ?> con &eacute;xito", 'index.php?pag=procesos&opc=listadoInscritos');
</script>