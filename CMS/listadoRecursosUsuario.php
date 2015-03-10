<?php
$carpeta = is_dir("../admin/recursos/".$_GET["id"]);

if($carpeta == false){
	mkdir("../admin/recursos/".$_GET["id"],7777);
}

chdir("../admin/recursos/".$_GET["id"]);
$archivos = glob( "*.*" );

$numRegistros = count($archivos);
$paginaActual = 0;
$registrosXPagina = 10;
if( isset( $_GET["pagina"] ) ) {
    $paginaActual = $_GET["pagina"];
}
?>
<h3>INGRESAR RECURSO</h3>
<form name="formEditarRecurso" method="post" action="actualizarRecursoUsuario.php" target="iframeOculto" enctype="multipart/form-data">
	<input id="id" name="id" type="hidden" value="<?php echo($_GET["id"]); ?>">
    <table width="100%" border="0">
        <tr>
            <td width="25%" valign="bottom">Archivo</td>
            <td width="75%"><input type="file" name="recurso" class="file_" size="50"></td>
        </tr>
    </table>
    <table width="100%">
        <tr align="center">
            <td width="50%"><input type="button" id="btnNuevo" class="button" onclick="javascript:document.formEditarRecurso.submit()" value="Insertar" /></td>
            <td width="50%"><input type="button" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=usuarios&opc=recursosUsuario'" value="Cancelar" /></td>
        </tr>
    </table>
</form>
<br />
<br />
<?php if($numRegistros != 0 ) {?>
<table id="tablaGen">
	<thead>
        <tr>
            <th width="90%" valign="bottom">DIRECCI&Oacute;N DEL RECURSO</th>
            <th width="10%" align="center">ELIMINAR</th>
        </tr>
	</thead>
	<?php /*http://<?php echo($_SERVER["SERVER_NAME"]); ?>/admin/recursos/<?php echo($_GET["id"]); */ ?>
    <?php 
    for($i = 0; $i < $numRegistros; $i++ ) {?>
        <tr>
            <td><?php echo($archivos[$i]); ?></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este recurso?')){document.location.href='index.php?pag=recursos&opc=eliminarRecursoUsuario&usuario=<?php echo($_GET["id"]); ?>&id=<?php echo($archivos[$i]); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php
    }?>
    </tbody>
</table>
<?php
}
else {?>
<br />
<h3>No existen recursos</h3><?php
}
?>