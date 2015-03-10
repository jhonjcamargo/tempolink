<?php 
require_once("DAO/InfoLaboral.php");
if(isset ($_POST["btnEnviar"])){
$fcIngreso = $_POST["cboAnoI"]."-".$_POST["cboMesI"]."-".$_POST["cboDiaI"];
$fcSalida = $_POST["cboAnoS"]."-".$_POST["cboMesS"]."-".$_POST["cboDiaS"];;
InfoLaboral::insertar($_POST["IDUsuario"], $_POST["txtEmpresa"], $_POST["txtCargo"], $fcIngreso, $fcSalida, $_POST["txtDescCargo"]);
}
$info = InfoLaboral::listado();
$numInfo = count($info);
?>
<br />
    <?php if($numInfo != 0){ ?>
    <strong>Detalle informaci&oacute;n laboral:</strong>
    <br /><br />
    <table id="tablaGen" style="width:630px;">
    	<tr>
        	<td class="item">Empresa</td>
            <td class="item">Cargo</td>
            <td class="item">Ingreso</td>
            <td class="item">Retiro</td>
            <td class="item">Descripcion cargo</td>
            <td class="item">Eliminar</td>
        </tr>
        <?php for($i=0; $i < $numInfo; $i++){ ?>
        <tr>
        	<td><?php echo($info[$i]->getEmpresa()) ?></td>
            <td><?php echo($info[$i]->getCargo()) ?></td>
            <td><?php echo($info[$i]->getIngreso()) ?></td>
            <td><?php echo($info[$i]->getSalida()) ?></td>
            <td><?php echo($info[$i]->getDesc()) ?></td>
            <td align="center"><a href="eliminarInfoLaboral.php?id=<?php echo($info[$i]->getId()); ?>"><img src="CMS/images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
        <? } ?>
    </table>
    <? }
	else{ ?>
    	<div style="font-size:14px; font-weight:bold">No tiene ningun registro</div>
    <?php } ?>