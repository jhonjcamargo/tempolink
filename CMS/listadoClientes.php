<?php 
require_once("../DAO/Cliente.php");
$cliente = Cliente::listado();
$numClientes = count($cliente);
?>
<h3>LISTADO DE CLIENTES</h3>
<br />
En esta secci&oacute;n encontrara el listado de los clientes. Usted podra crear, editar o eliminar sus clientes.<br /><br />
<?php if($numClientes != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>CLIENTE</th>
        	<th width="10%">ORDEN</th>
        	<th width="20%" align="center">IMAGEN</th>
            <th width="10%" align="center">EDITAR</th>
        	<th width="10%" align="center">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numClientes ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($cliente[$i]->getId()); ?></td>
        	<td><?php echo($cliente[$i]->getCliente()); ?></td>
        	<td align="center"><?php echo($cliente[$i]->getOrden()); ?></td>
        	<td align="center"><img src="../clientes/<?php echo($cliente[$i]->getThumb()); ?>" width="50" height="50" /></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=paginas&opc=editarCliente&id=<?php echo($cliente[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este cliente?')){document.location.href='index.php?pag=paginas&opc=eliminarCliente&id=<?php echo($cliente[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=paginas&opc=editarCliente&id=0'"/></td>
        </tr>
    </tfoot>
</table>
<?php }
else{
?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<td align="center"><strong>NO EXISTEN CLIENTES CREADOS ACTUALMENTE</strong></td>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=paginas&opc=editarCliente&id=0'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>