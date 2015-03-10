<?php 
require_once("DAO/InfoAcademica.php");
if(isset ($_POST["btnEnviar"])){
InfoAcademica::insertar($_POST["IDUsuario"], $_POST["cboNivelE"], $_POST["txtTitulo"], $_POST["txtInstitucion"]);
}

$info = InfoAcademica::listado();
$numInfo = count($info);
?>
<br />
    <?php if($numInfo != 0){ ?>
<strong>Detalle informaci&oacute;n academica:</strong>    
	<br /><br />
    <table id="tablaGen" style="width:630px;">
    	<tr>
        	<td class="item">Nivel estudios</td>
            <td class="item">Titulo Obtenido</td>
            <td class="item">Institucion</td>
            <td class="item">Eliminar</td>
        </tr>
        <?php for($i=0; $i < $numInfo; $i++){ ?>
        <tr>
        	<td><?php echo($info[$i]->getEstudio()) ?></td>
            <td><?php echo($info[$i]->getTitulo()) ?></td>
            <td><?php echo($info[$i]->getInstitucion()) ?></td>
            <td align="center"><a href="eliminarInfoAcademica.php?id=<?php echo($info[$i]->getId()); ?>"><img src="CMS/images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>            
        </tr>
        <? } ?>
    </table>
    <? }
	else{ ?>
    	<div style="font-size:14px; font-weight:bold">No tiene ningun registro</div>
    <?php } ?>
    
 </form>