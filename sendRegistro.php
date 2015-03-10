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
?>
<script type="text/javascript">
	document.location.href = 'index.php?pag=confirmaRegistro';
</script>