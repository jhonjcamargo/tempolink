<?php 
require_once("../DAO/UsuarioRegistrado.php");
require_once("../DAO/Postulacion.php");
require_once("../DAO/Oferta.php");
$postulaciones = Postulacion::cargarXusuario($_GET["id"]);
$numPostulaciones = count($postulaciones);
?>
<h3>LISTADO DE POSTULACIONES</h3>
<br />
En esta secci&oacute;n encontrara el listado de las postulaciones realizadas por el usuario.<br /><br />
<?php if($numPostulaciones != 0 ){?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<th>USUARIO</th>
            <th>POSTULACION</th>
        </tr>
    </thead>
    <tbody>
    <?php 
	for($i = 0; $i < $numPostulaciones ; $i++ ){?>
    	<tr>
        	 <?php
				$usuario = UsuarioRegistrado::cargar($postulaciones[$i]->getUsuario());
			?>
        	<td><a href="index.php?pag=procesos&opc=editarInscrito&id=<?php echo($usuario->getId()); ?>"><?php echo($usuario->getNombre()); ?>&nbsp;<?php echo($usuario->getApellido()); ?></a></td>
            <?php
				$oferta = Oferta::cargar($postulaciones[$i]->getOferta());
			?>
        	<td><a href="index.php?pag=procesos&opc=editarOfertas&id=<?php echo($oferta->getId()); ?>"><?php echo($oferta->getTitulo()); ?></a></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Volver" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=procesos&opc=listadoInscritos'"/></td>
        </tr>
    </tfoot>
</table>
<?php }
else{
?>
<table id="tablaGen">
	<thead>
    	<tr>
        	<td align="center"><strong>EL USUARIO NO SE HA POSTULADO A NINGUNA OFERTA LABORAL</strong></td>
        </tr>
    </thead>
    <tfoot>
    	<tr>
        	<td align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button"  onclick="javascript:document.location.href='index.php?pag=procesos&opc=listadoInscritos'"/></td>
        </tr>
    </tfoot>
</table>

<?php } ?>