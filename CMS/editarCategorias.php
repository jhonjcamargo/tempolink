<?php

require_once("../DAO/Categorias.php");
if( $_GET["id"] != 0 ){
    $categorias = Categorias::cargar( $_GET["id"] );
}
?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> CATEGORIAS</h3>
<form name="formEditarCategorias" method="post" action="actualizarCategorias.php" target="iframeOculto" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td width="175" class="celGen">Nombre de la categoria</td>
                <td width="763" class="celGen"><input type="text" name="nombre" value="<?php echo(($_GET["id"] != 0)?$categorias->getNombre():""); ?>" class="input"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarCategorias.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=procesos&opc=listadoCatCargos'"/></td>
            </tr>
        </tfoot>
	</table>
</form>