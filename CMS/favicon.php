<?php

require_once("../DAO/Configuracion.php");
$favicon = Configuracion::cargar(Configuracion::FAVICON);

?>
<h3>EDITAR FAVICON</h3>
<form
    name="formFavicon"
    method="post"
    enctype="multipart/form-data"
    style="border:0"
    action="actualizarConfiguracion.php"
    target="iframeOculto">
    <input type="hidden" name="id" value="<?php echo( Configuracion::FAVICON ); ?>" />
    <table>
        <tr>
            <td colspan="2">
                Seleccione el Favicon que desea para su sitio web.<br />
                <br />
                Los navegadores que permiten esta funci&oacute;n suelen mostrar el icono junto
                a la barra de direcciones, al lado del nombre del sitio en la lista de favoritos
                y al lado del título de la p&aacute;gina en una interfaz de documentos en pesta&ntilde;as.<br />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>Imagen:</td>
            <td>
                <div id="divImagen">
                    <?php echo($favicon->getValor()); ?>&nbsp;<input type="button" class="button" onclick="document.getElementById('divImagen').innerHTML='<input type=\'file\' class=\'file_\' name=\'favicon\' size=\'50\' />'" value="Cambiar">
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