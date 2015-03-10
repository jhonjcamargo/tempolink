<?php

chdir("../recursos/");
$archivos = glob( "*.*" );

$numRegistros = count($archivos);
$paginaActual = 0;
$registrosXPagina = 10;
if( isset( $_GET["pagina"] ) ) {
    $paginaActual = $_GET["pagina"];
}

?>
<h3>LISTADO DE RECURSOS</h3>
<br />
En esta secci&oacute;n usted podra subir recursos tales como imagenes, documentos digitales (.doc, .xls, .pdf, etc.), sonidos e incluirlos en los contenidos de su web.<br /><br />
<?php if($numRegistros != 0 ) {?>
<table id="tablaGen">
	<thead>
        <tr>
            <th width="90%" valign="bottom">DIRECCI&Oacute;N DEL RECURSO</th>
            <th width="10%" align="center">ELIMINAR</th>
        </tr>
	</thead>
    <tbody>
    <?php 
    for($i = 0; $i < $numRegistros; $i++ ) {?>
        <tr>
            <td>http://<?php echo($_SERVER["SERVER_NAME"]); ?>/recursos/<?php echo($archivos[$i]); ?></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este recurso?')){document.location.href='index.php?pag=recursos&opc=eliminarRecurso&id=<?php echo($archivos[$i]); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php
    }?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="2" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=recursos&opc=editarRecurso&id=0';"/></td>
        </tr>
    </tfoot>
</table>
<?php
}
else {?>
<br />
<h3>No existen recursos</h3><?php
}
?>