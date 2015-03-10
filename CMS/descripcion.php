<?php

require_once("../DAO/Configuracion.php");
$descripcion = Configuracion::cargar( Configuracion::DESCRIPCION );

?>
<h3>EDITAR DESCRIPCI&Oacute;N</h3>
<form
    name="formDescripcion"
    method="post"
    enctype="multipart/form-data"
    style="border:0"
    action="actualizarConfiguracion.php"
    target="iframeOculto">
    <input type="hidden" name="id" value="4" />
    <table>
        <tr>
            <td colspan="2">
                Modifique la descripci&oacute;n que desea para todas las p&aacute;ginas de su portal.<br />
				<br />
				Algunos motores de b&uacute;squeda incluyen esta informaci&oacute;n junto con los resultados
				de la b&uacute;squeda, por lo que para que sea realmente &uacute;til deber&iacute;a contener
				la mejor descripci&oacute;n posible de su portal.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Descripci&oacute;n:</td>
            <td><input type="text" class="input" value="<?php echo($descripcion->getValor()); ?>" name="descripcion"/></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="button" value="Actualizar"/>&nbsp;
                <input type="button" class="button" onclick="document.location.href='index.php?pag=general'" value="Cancelar"/>
            </td>
        </tr>
    </table>
</form>