<?php

require_once("../DAO/Pagina.php");

if( isset($_GET["padre"]) && $_GET["padre"] != "" ){
    $paginas = Pagina::listado($_GET["padre"]);
    $padre = $_GET["padre"];
}
else{
    $paginas = Pagina::listado();
    $padre = "";
}


$numRegistros = count($paginas);
$paginaActual = 0;
$registrosXPagina = 10;
if( isset( $_GET["pagina"] ) ){
    $paginaActual = $_GET["pagina"];
}

?>
<h3>LISTADO DE P&Aacute;GINAS</h3>
<br />
En esta secci&oacute;n usted podra crear y administrar las paginas de contenido de su sitio web.<br /><br />
<br />
<?php if($numRegistros != 0 ){?>
	<table id="tablaGen">
    	<thead>
            <tr>
                <th width="25%" valign="bottom">DIRECCI&Oacute;N DE ENLACE</th>
                <th width="30%" valign="bottom">T&Iacute;TULO DE LA P&Aacute;GINA</th>
                <th width="10%" align="center">HIJOS</th>
                <th width="10%" align="center">EDITAR</th>
        		<th width="10%" align="center">ELIMINAR</th>
            </tr>
        </thead>
		<tbody>
		<?php 
        for($i = 0; $i < $numRegistros; $i++ ){?>
            <tr>
                <td>index.php?pag=pagina&id=<?php echo($paginas[$i]->getId()); ?></td>
                <td><?php echo($paginas[$i]->getNombre()); ?></td>
                <td align="center"><a href="javascript:document.location.href='index.php?pag=paginas&opc=listadoPaginas&padre=<?php echo($paginas[$i]->getId()); ?>';"><img src="images/sons.png" alt="Hijos" title="Hijos" /></a></td>
                <td align="center"><a href="javascript:document.location.href='index.php?pag=paginas&opc=editarPagina&padre=<?php echo($padre); ?>&id=<?php echo($paginas[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
                <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar esta p\xe1gina?')){document.location.href='index.php?pag=paginas&opc=eliminarPagina&padre=<?php echo($padre); ?>&id=<?php echo($paginas[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
            </tr>
            <?php
        }?>
        </tbody>
    	<tfoot>
            <tr>
                <td colspan="5" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=paginas&opc=editarPagina&padre=<?php echo($padre); ?>&id=0';"/><?php if( isset($_GET["padre"]) && $_GET["padre"] != "" ){?> - <input type="button" id="btnVolver" class="button" value="Volver" onclick="javascript:document.location.href='index.php?pag=paginas&opc=listadoPaginas&padre=<?php echo(Pagina::getPadreXId($_GET["padre"])); ?>';"/><?php } ?></td>
            </tr>
        </tfoot>
    </table>
	<?php
}
else{?>
    <table id="tablaGen">
        <thead>
            <tr>
                <th align="center">NO EXISTEN CLIENTES CREADOS ACTUALMENTE</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"/></td>
            </tr>
        </tfoot>
    </table>
<?php
}
?>