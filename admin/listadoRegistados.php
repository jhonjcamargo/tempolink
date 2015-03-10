<?php 
require_once("../DAO/UsuarioRegistrado.php");
$usuarios = UsuarioRegistrado::listado();
$numUsuarios = count($usuarios);
?>
<h3>LISTADO DE USUARIOS REGISTRADOS</h3><br />
En esta secci&oacute;n encontrara el listado de todos los usuarios registrados a traves de la pagina web.<br /><br />
<?php if($numUsuarios != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th width="10%" align="center">ID</th>
        	<th>USUARIO</th>
        	<th width="10%">CORREO</th>
            <th width="10%" align="center">VER M&Aacute;S</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numUsuarios ; $i++ ){?>
    	<tr>
        	<td align="center"><?php echo($usuarios[$i]->getId()); ?></td>
        	<td><?php echo($usuarios[$i]->getNombre()); ?>&nbsp;<?php echo($usuarios[$i]->getApellido()); ?></td>
        	<td align="center"><?php echo($usuarios[$i]->getEmail()); ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=registrados&opc=detalleRegistro&id=<?php echo($usuarios[$i]->getId()); ?>';"><img src="images/add.png" alt="Ver mas" title="Ver mas" /></a></td>
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