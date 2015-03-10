<?php

require_once("../DAO/UsuarioTempo.php");

if( $_POST["id"] != 0 ){
    $usuario = UsuarioTempo::cargar($_POST["id"]);
    $usuario->setNombre( htmlspecialchars($_POST["nombre"],ENT_QUOTES,"UTF-8") );
    $usuario->setTipo($_POST["cboTipo"]);
    $usuario->setDoc($_POST["doc"]);
    $usuario->setEmail($_POST["email"]);
    $usuario->setLogin( $_POST["login"] );
    $usuario->setContrasena($_POST["contrasena"]);
}
else{
    UsuarioTempo::insertar(
        htmlspecialchars($_POST["nombre"],ENT_QUOTES,"UTF-8"),
		$_POST["cboTipo"],
		$_POST["doc"],
		$_POST["email"],
        $_POST["login"],
        $_POST["contrasena"]
    );
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Usuario <?php echo(($_POST["id"])?"actualizado":"insertado"); ?>", "El usuario fue <?php echo(($_POST["id"])?"actualizado":"insertado"); ?> con &eacute;xito", 'index.php?pag=usuarios&opc=listadoTempo');
</script>