<?php 
require_once("../DAO/Categorias.php");
$categorias = Categorias::listado();
$numCat = count($categorias);
?>
<h3>LISTADO DE CATEGORIAS</h3>
<br />
En esta secci&oacute;n encontrara el listado de catergorias, las cuales agruparan los cargos. Usted podra crear, editar o eliminar sus categorias.<br /><br />
<?php if($numCat != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>NOMBRE</th>
            <th width="10%" align="center">EDITAR</th>
        	<th width="10%" align="center">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numCat ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($categorias[$i]->getId()); ?></td>
        	<td><?php echo($categorias[$i]->getNombre()); ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=general&opc=editarCategorias&id=<?php echo($categorias[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar esta red social?')){document.location.href='index.php?pag=procesos&opc=eliminarCategorias&id=<?php echo($categorias[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=general&opc=editarCategorias&id=0'"/></td>
        </tr>
    </tfoot>
</table>
<?php }
else{
?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<td align="center"><strong>NO EXISTEN CATEGORIAS ACTUALMENTE</strong></td>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=general&opc=editarCategorias&id=0'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>