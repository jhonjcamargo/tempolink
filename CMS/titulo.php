<?php

require_once("../DAO/Configuracion.php");
$titulo = Configuracion::cargar( Configuracion::TITULO );

?>
<h3>EDITAR T&Iacute;TULO</h3>
<form
    name="formTitulo"
    method="post"
    enctype="multipart/form-data"
    style="border:0"
    action="actualizarConfiguracion.php"
    target="iframeOculto">
    <input type="hidden" name="id" value="2" />
    <table>
        <tr>
            <td colspan="2">
                Modifique el t&iacute;tulo que desea para todas las p&aacute;ginas de su portal.
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>T&iacute;tulo:</td>
            <td><input type="text" class="input" value="<?php echo($titulo->getValor()); ?>" name="titulo"/></td>
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