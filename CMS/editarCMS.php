<?php

require_once("../DAO/Usuario.php");
if( $_GET["id"] != 0 ) {
    $usuario = Usuario::cargar( $_GET["id"] );
}

?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> USUARIO</h3>
<form name="formEditarUsuario" method="post" action="actualizarCMS.php" target="iframeOculto">
    <input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table width="100%">
        <tr>
            <td width="25%">Nombre:</td>
            <td width="75%"><input type="text" class="input" name="nombre" value="<?php echo(($_GET["id"] != 0)?$usuario->getNombre():""); ?>" /></td>
        </tr>
        <tr><td colspan="2"><td></tr>
        <tr>
            <td width="25%">Usuario:</td>
            <td width="75%"><input type="text" class="input" name="login" value="<?php echo(($_GET["id"] != 0)?$usuario->getLogin():""); ?>" /></td>
        </tr>
        <tr><td colspan="2"><td></tr>
        <tr>
            <td width="25%">Contrase&ntilde;a:</td>
            <td width="75%"><input type="password" class="input" name="contrasena" value="" /></td>
        </tr>	
        <tr><td colspan="2"><td></tr>
        <tr><td colspan="2"><td></tr>
    </table>
    <table width="100%">
        <tr align="center">
            <td width="50%"><input type="button" id="btnGuardar" name="btnGuardar" onclick="javascript:document.formEditarUsuario.submit()" value="Guardar" class="button"  /></td>
            <td width="50%"><input type="button" id="btnVolver" name="btnVolver" onclick="javascript:document.location.href='index.php?pag=usuarios&opc=listadoCMS'" value="Cancelar" class="button"></td>
        </tr>
    </table>
</form>