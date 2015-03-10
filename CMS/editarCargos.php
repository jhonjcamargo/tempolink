<?php

require_once("../DAO/Cargos.php");
require_once("../DAO/Categorias.php");

$IDCategoria = 0;

if( $_GET["id"] != 0 ){
    $cargos = Cargos::cargar( $_GET["id"] );
	$Categoria_ =  Categorias::cargar($cargos->getCategoria());
	$IDCategoria = $Categoria_->getId();
}

$categoria = Categorias::listado();
$numCategoria = count($categoria);
?>
<h3><?php echo(($_GET["id"] != 0)?"EDITAR":"INGRESAR"); ?> CARGOS</h3>
<form name="formEditarCargos" method="post" action="actualizarCargos.php" target="iframeOculto" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table id="tablaDetalle">
	    <tbody>
            <tr>
                <td width="175" class="celGen">Nombre cargo</td>
                <td width="763" class="celGen"><input type="text" name="nombre" value="<?php echo(($_GET["id"] != 0)?$cargos->getNombre():""); ?>" class="input"></td>
            </tr>
            <tr>
                <td class="celGen">Categoria</td>
                <td class="celGen">
                	<select id="cboCategoria" name="cboCategoria">
                    	<option value="">:: Seleccione categoria ::</option>
                        <?php 
						
						for($i = 0; $i < $numCategoria; $i++){?>
                        	<option value="<?php echo($categoria[$i]->getId()); ?>" <?php if($categoria[$i]->getId() == $IDCategoria){ ?>selected="selected"<?php } ?>><?php echo($categoria[$i]->getNombre());?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnGuardar" class="button" value="Guardar" onclick="javascript:document.formEditarCargos.submit()" /> - 
                <input type="button" id="btnCancelar" class="button" value="Cancelar" onclick="javascript:document.location.href='index.php?pag=procesos&opc=ListadoCargos'"/></td>
            </tr>
        </tfoot>
	</table>
</form>