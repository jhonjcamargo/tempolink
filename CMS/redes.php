<?php 
require_once("../DAO/Redes.php");
$redes = Redes::listado();
$numRedes = count($redes);
?>
<h3>LISTADO DE REDES SOCIALES</h3>
<br />
En esta secci&oacute;n encontrara el listado de las redes sociales a las cuales usted podra hacer referencia para que sus clientes o visitantes lo sigan. Usted podra crear, editar o eliminar sus redes sociales.<br /><br />
<?php if($numRedes != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>NOMBRE</th>
        	<th width="10%">LINK</th>
        	<th width="20%" align="center">IMAGEN</th>
            <th width="10%" align="center">EDITAR</th>
        	<th width="10%" align="center">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numRedes ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($redes[$i]->getId()); ?></td>
        	<td><?php echo($redes[$i]->getNombre()); ?></td>
        	<td align="center"><?php echo($redes[$i]->getLink()); ?></td>
        	<td align="center"><img src="../images/redes/<?php echo($redes[$i]->getThumb()); ?>" width="22" height="22" /></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=general&opc=editarRedes&id=<?php echo($redes[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar esta red social?')){document.location.href='index.php?pag=paginas&opc=eliminarRedes&id=<?php echo($redes[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=general&opc=editarRedes&id=0'"/></td>
        </tr>
    </tfoot>
</table>
<?php }
else{
?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<td align="center"><strong>NO EXISTEN REDES SOCIALES CREADAS ACTUALMENTE</strong></td>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=general&opc=editarRedes&id=0'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>