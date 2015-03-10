<?php 
require_once("DAO/UsuarioRegistrado.php");

if( $_POST["IDUsuario"] != 0 ){
	//$fecha = $_POST["cboAno"]."-".$_POST["cboMes"]."-".$_POST["cboDia"];
	
	
	$usuario = UsuarioRegistrado::cargar($_POST["IDUsuario"]);
	$usuario->setNombre( $_POST["nombre"]);
    $usuario->setApellido( $_POST["apellido"] );
    $usuario->setTipoDoc( $_POST["cboTipo"] );
    $usuario->setDocumento( $_POST["documento"] );
	//if($fecha != '0-0-0'){
    //$usuario->setNacimiento( $fecha );
	//}
    $usuario->setGenero( $_POST["rdgGenero"] );
    $usuario->setCiudad( $_POST["ciudad"] );
    $usuario->setDireccion( $_POST["direccion"] );
    $usuario->setTelefono( $_POST["tfno"] );
    $usuario->setPerfil( $_POST["perfil"] );
    $usuario->setEmail( $_POST["email"] );
	$usuario->setUsuario($_POST["usuario"]);
	$usuario->setPass(md5($_POST["pass"]));
	
	echo('<script type="text/javascript">document.location.href="index.php?pag=perfil";</script>');
}
?>