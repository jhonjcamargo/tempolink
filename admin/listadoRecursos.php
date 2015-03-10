<?php

chdir("recursos/".$_SESSION['id']);
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
A continuaci&oacute;n encontrara el listado de recursos.
<?php if($numRegistros != 0 ) {?>
<table id="tablaGen">
	<thead>
        <tr>
            <th width="90%" valign="bottom">DIRECCI&Oacute;N DEL RECURSO</th>
        </tr>
	</thead>
    <tbody>
    <?php 
    for($i = 0; $i < $numRegistros; $i++ ) {?>
        <tr>
            <td><a href="recursos/<?php echo($_SESSION['id']); ?>/<?php echo($archivos[$i]); ?>" target="_self"><?php echo($archivos[$i]); ?></a></td>
        </tr>
    <?php
    }?>
    </tbody>
</table>
<?php
}
else {?>
<br />
<br />
<h3>No existen recursos</h3><?php
}
?>