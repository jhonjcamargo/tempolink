<?php

require_once("../DAO/Usuario.php");

if( $_POST["id"] != 0 ){
    $usuario = Usuario::cargar($_POST["id"]);
    $usuario->setNombre( htmlspecialchars($_POST["nombre"],ENT_QUOTES,"UTF-8") );
    $usuario->setLogin( $_POST["login"] );
    $usuario->setContrasena( md5($_POST["contrasena"] ));
}
else{
    Usuario::insertar(
        htmlspecialchars($_POST["nombre"],ENT_QUOTES,"UTF-8"),
        $_POST["login"],
        md5($_POST["contrasena"])
    );
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Usuario <?php echo(($_POST["id"])?"actualizado":"insertado"); ?>", "El usuario fue <?php echo(($_POST["id"])?"actualizado":"insertado"); ?> con &eacute;xito", 'index.php?pag=usuarios&opc=listadoCMS');
</script>