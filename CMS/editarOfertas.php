<?php

require_once("../DAO/Oferta.php");
require_once("../DAO/Cargos.php");
$IDCargos = 0;
$destacado = "";
if( $_GET["id"] != 0 ){
    $oferta = Oferta::cargar( $_GET["id"] );
	$destacado = $oferta->getDestacado();
	$cargos_ =  Cargos::cargar($oferta->getCargo());
	$IDCargos = $cargos_->getId();
}

$cargos = Cargos::listado();
$numCargos = count($cargos);
?>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,media,table",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"+
                "justifyleft,justifycenter,justifyright,justifyfull,separator,"+
                "bullist,numlist,separator,"+
                "outdent,indent,separator,"+
                "cut,copy,paste,undo,redo,separator,"+
                "link,unlink,anchor,separator,"+
                "image,media,hr,charmap,separator,"+
                "cleanup,removeformat,visualaid",
        theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,styleselect,separator,"+
                "sub,sup,forecolor,backcolor,separator,"+
                "newdocument,emotions,separator,"+
                "help,code",
        theme_advanced_buttons3 : "tablecontrols",
        language : 'es',
		content_css : "",
        apply_source_formatting : false,
        height: 380
    });
</script>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> OFERTA LABORAL</h3>
<form name="formEditarOferta" method="post" action="actualizarOfertas.php" target="iframeOculto" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td class="celGen">Titulo</td>
                <td class="celGen"><input type="text" name="titulo" value="<?php echo(($_GET["id"] != 0)?$oferta->getTitulo():""); ?>" class="input"></td>
            </tr>
            <tr>
                <td class="celGen">Imagen</td>
                <td class="celGen">
                	<div id="divImagen">
						<?php echo(($_GET["id"] != 0)?$oferta->getThumb():""); ?>&nbsp;<input type="button" class="button" onclick="document.getElementById('divImagen').innerHTML='<input type=\'file\' class=\'file_\' name=\'thumb\' size=\'50\' />'" value="Cambiar">
                    </div>
                     Recuerde que el nombre de las imagenes no deben tener espacios en blanco ni caracteres especiales ya que podria presentar problemas.
                </td>
            </tr>
            <tr>
                <td class="celGen">Cargos</td>
                <td class="celGen">
                	<select id="cboCargo" name="cboCargo">
                    	<option value="">:: Seleccione cargo ::</option>
                        <?php 
						
						for($i = 0; $i < $numCargos; $i++){?>
                        	<option value="<?php echo($cargos[$i]->getId()); ?>" <?php if($cargos[$i]->getId() == $IDCargos){ ?>selected="selected"<?php } ?>><?php echo($cargos[$i]->getNombre());?></option>
                        <?php } ?>
                    </select>
                </td>
             </tr>
             <tr>
                <td class="celGen">Destacado</td>
                <td class="celGen">
                	<select id="cboDestacado" name="cboDestacado">
                    	<option value"">:: Seleccione un Item ::</option>
                        <option value="0" <?php if($destacado == 0) {?> selected="selected"<?php } ?>>NO</option>
                        <option value="1" <?php if($destacado == 1) {?> selected="selected"<?php } ?>>SI</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td colspan="2" class="celGen">Descripci&oacute;n</td>
            </tr>
            <tr>
            	<td colspan="2" class="celGen">
                	<textarea name="descripcion"><?php echo(($_GET["id"] != 0)?$oferta->getDesc():""); ?></textarea>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarOferta.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=procesos&opc=listadoOfertas'"/></td>
            </tr>
        </tfoot>
	</table>
</form>