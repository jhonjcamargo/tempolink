<?php

require_once("../DAO/Pagina.php");
if( $_GET["id"] != 0 ){
    $pagina = Pagina::cargar( $_GET["id"] );
}
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
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> P&Aacute;GINA</h3>
<form name="formEditarPagina" method="post" action="actualizarPagina.php" target="iframeOculto">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
	<input type="hidden" name="padre" value="<?php echo($_GET["padre"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td class="celGen">Nombre de la p&aacute;gina</td>
                <td class="celGen"><input type="text" name="nombre" value="<?php echo(($_GET["id"] != 0)?$pagina->getNombre():""); ?>" class="input"></td>
            </tr>
            <tr>
                <td class="celGen" colspan="2">Contenido</td>
            </tr>
            <tr>
                <td class="celGen" colspan="2"><textarea name="texto"><?php echo(($_GET["id"] != 0)?$pagina->getContenido():""); ?></textarea></td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarPagina.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=paginas&opc=listadoPaginas&padre=<?php echo($_GET["padre"]); ?>'"/></td>
            </tr>
        </tfoot>
	</table>
</form>