<?php

require_once("../DAO/Redes.php");
if( $_GET["id"] != 0 ){
    $redes = Redes::cargar( $_GET["id"] );
}
?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> REDES SOCIALES</h3>
<form name="formEditarRedes" method="post" action="actualizarRedes.php" target="iframeOculto" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td width="175" class="celGen">Nombre red social</td>
                <td width="763" class="celGen"><input type="text" name="nombre" value="<?php echo(($_GET["id"] != 0)?$redes->getNombre():""); ?>" class="input"></td>
            </tr>
            <tr>
                <td class="celGen">Link red social</td>
                <td class="celGen"><input type="text" name="link" value="<?php echo(($_GET["id"] != 0)?$redes->getLink():""); ?>" class="input"></td>
            </tr>
             <tr>
                <td class="celGen">Imagen red social</td>
                <td class="celGen">
                <div id="divImagen">
                    <?php echo(($_GET["id"] != 0)?$redes->getThumb():""); ?>&nbsp;<input type="button" class="button" onclick="document.getElementById('divImagen').innerHTML='<input type=\'file\' class=\'file_\' name=\'thumb\' size=\'50\' />'" value="Cambiar">
                </div>
                Recuerde que el nombre de las imagenes no deben tener espacios en blanco ni caracteres especiales ya que podria presentar problemas.
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarRedes.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=general&opc=redes'"/></td>
            </tr>
        </tfoot>
	</table>
</form>