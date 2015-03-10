<?php

require_once("../DAO/UsuarioTempo.php");
$usuarios = UsuarioTempo::listado();
$numRegistros = count($usuarios);
$paginaActual = 0;
$registrosXPagina = 10;
if( isset( $_GET["pagina"] ) ) {
    $paginaActual = $_GET["pagina"];
}

?>
<h3>LISTADO DE USUARIOS TEMPOLINK</h3>
<br />
En esta secci&oacute;n usted podra gestionar los usuario que tendran acceso a diferentes datos dependiendo el rol que se determine.<br /><br />
<?php if($numRegistros != 0 ) {?>
<table id="tablaGen">
	<thead>
        <tr>
            <th width="50%" valign="bottom">NOMBRE DEL USUARIO</th>
            <th width="20%" align="center">USUARIO</th>
            <th width="20%" align="center">TIPO</th>
            <th width="10%" align="center">EDITAR</th>
            <th width="10%" align="center">ELIMINAR</th>
        </tr>
	</thead>
	<tbody>
    <?php
    for($i =0; $i < $numRegistros; $i++ ) {?>
        <tr>
            <td><?php echo($usuarios[$i]->getNombre()); ?></td>
            <td align="center"><?php echo($usuarios[$i]->getLogin()); ?></td>
            <td align="center"><?php if($usuarios[$i]->getTipo() == 0){echo('Empleado');}else if ($usuarios[$i]->getTipo() == 1){echo('Empresa');} ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=usuarios&opc=editarUsuarioTempo&id=<?php echo($usuarios[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este usuario?')){document.location.href='index.php?pag=usuarios&opc=eliminarUsuarioTempo&id=<?php echo($usuarios[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php
    }?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=usuarios&opc=editarUsuarioTempo&id=0';"/></td>
        </tr>
    </tfoot>
</table> 
<?php
}
else {?>
<br />
<table id="tablaGen">
        <thead>
            <tr>
                <th align="center">NO EXISTEN USUARIOS</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=usuarios&opc=editarUsuarioTempo&id=0'"/></td>
            </tr>
        </tfoot>
    </table>
<?php
}
?>