<?php 
require_once("../DAO/UsuarioRegistrado.php");
$usuarios = UsuarioRegistrado::listado();
$numUsuarios = count($usuarios);
?>
<h3>LISTADO DE INSCRITOS</h3>
<br />
En esta secci&oacute;n encontrara el listado de todos los usuarios registrados a traves de la pagina web.<br /><br />
<?php if($numUsuarios != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>USUARIO</th>
        	<th width="10%">ESTADO</th>
            <th width="10%" align="center">POSTULACIONES</th>
            <th width="10%" align="center">EDITAR</th>
        	<th width="10%" align="center">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numUsuarios ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($usuarios[$i]->getId()); ?></td>
        	<td><?php echo($usuarios[$i]->getNombre()); ?>&nbsp;<?php echo($usuarios[$i]->getApellido()); ?></td>
        	<td align="center"><?php if($usuarios[$i]->getActivo() == 'A'){echo('Activo');}else if ($usuarios[$i]->getActivo() == 'P'){echo('Sin aprobar');} else if($usuarios[$i]->getActivo() == 'I'){echo('Inactivo');} ?></td>
            <td align="center"><?php if($usuarios[$i]->getActivo() == 'A'){?><a href="javascript:document.location.href='index.php?pag=procesos&opc=usuarioPostulaciones&id=<?php echo($usuarios[$i]->getId()); ?>';"><img src="images/add.png" alt="Postulaciones" title="Postulaciones" /></a><?php } ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=procesos&opc=editarInscrito&id=<?php echo($usuarios[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este ofertas?')){document.location.href='index.php?pag=paginas&opc=eliminarInscrito&id=<?php echo($usuarios[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <!--<tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=procesos&opc=editarInscrito&id=0'"/></td>
        </tr>
    </tfoot>-->
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
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=procesos&opc=editarInscrito&id=0'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>