<?php

require_once("../DAO/Configuracion.php");
$claves = Configuracion::cargar( Configuracion::KEYWORDS );

?>
<h3>EDITAR PALABRAS CLAVES</h3>
<form
    name="formClaves"
    method="post"
    enctype="multipart/form-data"
    style="border:0"
    action="actualizarConfiguracion.php"
    target="iframeOculto">
    <input type="hidden" name="id" value="3" />
    <table>
        <tr>
            <td colspan="2">
                Modifique las palabras claves que desea para todas las p&aacute;ginas de su portal.<br />
				<br />
				Algunos buscadores utilizan este elemento para clasificar los documentos por palabras clave.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Palabras Claves:</td>
            <td><input type="text" class="input" value="<?php echo($claves->getValor()); ?>" name="claves"/></td>
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