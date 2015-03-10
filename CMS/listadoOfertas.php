<?php 
require_once("../DAO/Oferta.php");
$ofertas = Oferta::listado();
$numOfertas = count($ofertas);
?>
<h3>LISTADO DE OFERTAS LABORALES</h3>
<br />
En esta secci&oacute;n encontrara el listado de los ofertas. Usted podra crear, editar o eliminar sus ofertass.<br /><br />
<?php if($numOfertas != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>TITULO OFERTA</th>
        	<th width="10%">DESTACADO</th>
            <th width="10%" align="center">EDITAR</th>
        	<th width="10%" align="center">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numOfertas ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($ofertas[$i]->getId()); ?></td>
        	<td><?php echo($ofertas[$i]->getTitulo()); ?></td>
        	<td align="center"><?php if($ofertas[$i]->getDestacado() == 1){echo('SI');}else if ($ofertas[$i]->getDestacado() == 0){echo('NO');} ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=procesos&opc=editarOfertas&id=<?php echo($ofertas[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar esta oferta?')){document.location.href='index.php?pag=paginas&opc=eliminarOferta&id=<?php echo($ofertas[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=procesos&opc=editarOfertas&id=0'"/></td>
        </tr>
    </tfoot>
</table>
<?php }
else{
?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<td align="center"><strong>NO EXISTEN OFERTAS LABORALES CREADAS ACTUALMENTE</strong></td>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=procesos&opc=editarOfertas&id=0'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>