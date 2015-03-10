<?php 
require_once("../DAO/UsuarioRegistrado.php");
$genero = "";
$tipoDoc = "";
$activo = "";
if( $_GET["id"] != 0 ){
	$usuario = UsuarioRegistrado::cargar($_GET["id"]);
	$genero = $usuario->getGenero();
	$tipoDoc = $usuario->getTipoDoc();
	$activo = $usuario->getActivo();
}
?>

<h3>DETALLE INSCRITO</h3>
<form name="frmInscrito" method="post" action="actualizarInscrito.php" target="iframeOculto">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table width="383" id="tablaDetalle">
	    <tbody>
            <tr>
                <td class="celGen">Nombres</td>
                <td class="celGen"><input type="text" id="nombre" name="nombre" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getNombre():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Apellidos</td>
                <td class="celGen"><input type="text" id="apellido" name="apellido" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getApellido():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Tipo de Documento</td>
                <td class="celGen">
					<select name="cboTipo" id="cboTipo" class="select_">
                        <option value="0">:: Tipo Documento ::</option>
                        <option value="CC" <?php if($tipoDoc != "" && $tipoDoc == 'CC'){ echo('selected="selected"'); }?>>C&eacute;dula</option>
                        <option value="CE" <?php if($tipoDoc != "" && $tipoDoc == 'CE'){ echo('selected="selected"'); }?>>C&eacute;dula de extrangeria</option>
                        <option value="PST" <?php if($tipoDoc != "" && $tipoDoc == 'PST'){ echo('selected="selected"'); }?>>Pasaporte</option>
                        <option value="TI" <?php if($tipoDoc != "" && $tipoDoc == 'TI'){ echo('selected="selected"'); }?>>Tarjeta de identidad</option>
                    </select>
				</td>
            </tr>
            <tr>
                <td class="celGen">N&uacute;mero de documento</td>
                <td class="celGen"><input type="text" id="documento" name="documento" class="input" readonly="readonly" value="<?php echo(($_GET["id"] != 0)?$usuario->getDocumento():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Fecha de nacimiento</td>
                <td class="celGen"><input type="text" id="nacimiento" name="nacimiento" class="input" readonly="readonly" value="<?php echo(($_GET["id"] != 0)?$usuario->getNacimiento():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Genero</td>
                <td class="celGen">
                	<label for="rdgGenero_0"><input type="radio" name="rdgGenero" value="M" id="rdgGenero_0" <?php if($genero != "" && $genero == 'M'){ echo('checked="checked"'); }?>/>&nbsp;&nbsp;Masculino</label>
                	<label for="rdgGenero_1"><input type="radio" name="rdgGenero" value="F" id="rdgGenero_1" <?php if($genero != "" && $genero == 'F'){ echo('checked="checked"'); }?>/>&nbsp;&nbsp;Femenino</label>
            </tr>
            <tr>
                <td class="celGen">Ciudad</td>
                <td class="celGen"><input type="text" id="ciudad" name="ciudad" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getCiudad():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Direcci&oacute;n</td>
                <td class="celGen"><input type="text" id="direccion" name="direccion" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getDireccion():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Telefono y/o Celular</td>
                <td class="celGen"><input type="text" id="tfno" name="tfno" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getTelefono():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Perfil</td>
                <td class="celGen"><textarea id="perfil" name="perfil" class="textArea"><?php echo(($_GET["id"] != 0)?$usuario->getPerfil():""); ?></textarea></td>
            </tr>
            <tr>
                <td class="celGen">Email</td>
                <td class="celGen"><input type="text" id="email" name="email" class="input" value="<?php echo(($_GET["id"] != 0)?$usuario->getEmail():""); ?>" /></td>
            </tr>
            <tr>
                <td class="celGen">Usuario</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getUsuario():""); ?></td>
            </tr>
            <tr>
                <td class="celGen">Estado</td>
                <td class="celGen">
                	<select id="cboEstado" name="cboEstado" class="select_">
                    	<option value="A" <?php if($activo != "" && $activo == 'A'){ echo('selected="selected"'); }?>>Activo</option>
                        <option value="P" <?php if($activo != "" && $activo == 'P'){ echo('selected="selected"'); }?>>Sin Aprobar</option>
                        <option value="I" <?php if($activo != "" && $activo == 'I'){ echo('selected="selected"'); }?>>Inactivo</option>
                    </select>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.frmInscrito.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=procesos&opc=listadoInscritos'"/></td>
            </tr>
        </tfoot>
	</table>
    
    
</form>