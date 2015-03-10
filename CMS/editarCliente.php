<?php

require_once("../DAO/Cliente.php");
if( $_GET["id"] != 0 ){
    $cliente = Cliente::cargar( $_GET["id"] );
}
?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> CLIENTE</h3>
<form name="formEditarPagina" method="post" action="actualizarCliente.php" target="iframeOculto" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td class="celGen">Nombre del cliente</td>
                <td class="celGen"><input type="text" name="cliente" value="<?php echo(($_GET["id"] != 0)?$cliente->getCliente():""); ?>" class="input"></td>
            </tr>
            <tr>
                <td class="celGen">Orden</td>
                <td class="celGen"><input type="text" name="orden" value="<?php echo(($_GET["id"] != 0)?$cliente->getOrden():""); ?>" class="input" style="width:50px; text-align:right"></td>
            </tr>
             <tr>
                <td class="celGen">Imagen del cliente</td>
                <td class="celGen">
                <div id="divImagen">
                    <?php echo(($_GET["id"] != 0)?$cliente->getThumb():""); ?>&nbsp;<input type="button" class="button" onclick="document.getElementById('divImagen').innerHTML='<input type=\'file\' class=\'file_\' name=\'thumbC\' size=\'50\' />'" value="Cambiar">
                </div>
                 Recuerde que el nombre de las imagenes no deben tener espacios en blanco ni caracteres especiales ya que podria presentar problemas.
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarPagina.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=paginas&opc=listadoClientes'"/></td>
            </tr>
        </tfoot>
	</table>
</form>