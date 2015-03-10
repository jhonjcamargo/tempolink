<?php

require_once("../DAO/UsuarioTempo.php");
$tipo = '';
if( $_GET["id"] != 0 ) {
    $usuario = UsuarioTempo::cargar( $_GET["id"] );
	$tipo = $usuario->getTipo();
}

?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> USUARIO TEMPOLINK</h3>
<form name="formEditarUsuario" method="post" action="actualizarUsuarioTempo.php" target="iframeOculto">
    <input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table width="100%">
        <tr>
            <td width="25%">Tipo de rol:</td>
            <td width="75%">
            	<select id="cboTipo" name="cboTipo" class="select_" >
                	<option value="">:: Seleccione rol ::</option>
                    <option value="0" <?php if($tipo == 0){ ?>selected="selected" <?php } ?>>Empleado</option>
                    <option value="1" <?php if($tipo == 1){ ?>selected="selected" <?php } ?>>Empresa</option> 
                </select>
            </td>
        </tr>
        <tr>
            <td width="25%">Nombre:</td>
            <td width="75%"><input type="text" class="input" name="nombre" value="<?php echo(($_GET["id"] != 0)?$usuario->getNombre():""); ?>"  /></td>
        </tr>
        <tr>
            <td width="25%">Cedula y/o NIT:</td>
            <td width="75%"><input type="text" class="input" name="doc" value="<?php echo(($_GET["id"] != 0)?$usuario->getDoc():""); ?>"  /></td>
        </tr>
        <tr>
            <td width="25%">Correo Electronico:</td>
            <td width="75%"><input type="text" class="input" name="email" value="<?php echo(($_GET["id"] != 0)?$usuario->getEmail():""); ?>"  /></td>
        </tr>
        <tr><td colspan="2"><td></tr>
        <tr>
            <td width="25%">Usuario:</td>
            <td width="75%"><input type="text" class="input" name="login" value="<?php echo(($_GET["id"] != 0)?$usuario->getLogin():""); ?>" /></td>
        </tr>
        <tr><td colspan="2"><td></tr>
        <tr>
            <td width="25%">Contrase&ntilde;a:</td>
            <td width="75%"><input type="text" class="input" name="contrasena" value="<?php echo(($_GET["id"] != 0)?$usuario->getContrasena():""); ?>" /></td>
        </tr>
        <tr><td colspan="2"><td></tr>
        <tr><td colspan="2"><td></tr>
    </table>
    <table width="100%">
        <tr align="center">
            <td width="50%"><input type="button" class="button" onClick="javascript:document.formEditarUsuario.submit()" value="Guardar"></td>
            <td width="50%"><input type="button" class="button" onClick="javascript:document.location.href='index.php?pag=usuarios&opc=listadoTempo'" value="Cancelar"></td>
        </tr>
    </table>
</form>