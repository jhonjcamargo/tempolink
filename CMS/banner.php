<?php

require_once("../DAO/Configuracion.php");
$favicon = Configuracion::cargar(Configuracion::BANNER);

?>
<h3>EDITAR BANNER</h3>
<form
    name="formBanner"
    method="post"
    enctype="multipart/form-data"
    style="border:0"
    action="actualizarConfiguracion.php"
    target="iframeOculto">
    <input type="hidden" name="id" value="<?php echo( Configuracion::BANNER ); ?>" />
    <table>
        <tr>
            <td colspan="2">
                Seleccione el banner que estara en el home de su sitio web.<br />
                <br />
                Este banner debe estar realizado en Flash con una publicaci&oacute;n final en .swf.<br />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Imagen:</td>
            <td>
                <div id="divImagen">
                    <?php echo($favicon->getValor()); ?>&nbsp;<input type="button" class="button" onclick="document.getElementById('divImagen').innerHTML='<input type=\'file\' class=\'file_\' name=\'banner\' size=\'50\' />'" value="Cambiar">
                </div>
            </td>
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