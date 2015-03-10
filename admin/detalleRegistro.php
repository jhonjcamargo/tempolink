<?php 
require_once("../DAO/UsuarioRegistrado.php");
$genero = "";
$tipoDoc = "";
$activo = "";
if( $_GET["id"] != 0 ){
	$usuario = UsuarioRegistrado::cargar($_GET["id"]);
	$genero = $usuario->getGenero();
	$tipoDoc = $usuario->getTipoDoc();
	$activo = $usuario->getActivo();
}
?>

<h3>DETALLE INSCRITO</h3>
<form name="frmInscrito" method="post" action="actualizarInscrito.php" target="iframeOculto">
	<input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>">
    <table width="383" id="tablaDetalle">
	    <tbody>
            <tr>
                <td class="celDtl">Nombres</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getNombre():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Apellidos</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getApellido():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Tipo de Documento</td>
                <td class="celGen">
                        <?php if($tipoDoc != "" && $tipoDoc == 'CC'){ echo('C&eacute;dula'); }?>
                        <?php if($tipoDoc != "" && $tipoDoc == 'CE'){ echo('C&eacute;dula de extrangeria'); }?>
                        <?php if($tipoDoc != "" && $tipoDoc == 'PST'){ echo('Pasaporte'); }?>
                        <?php if($tipoDoc != "" && $tipoDoc == 'TI'){ echo('Tarjeta de identidad'); }?>
				</td>
            </tr>
            <tr>
                <td class="celDtl">N&uacute;mero de documento</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getDocumento():""); ?>"</td>
            </tr>
            <tr>
                <td class="celDtl">Fecha de nacimiento</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getNacimiento():""); ?>"</td>
            </tr>
            <tr>
                <td class="celDtl">Genero</td>
                <td class="celGen">
                	<?php if($genero != "" && $genero == 'M'){ echo('Masculino'); }?>
                	<?php if($genero != "" && $genero == 'F'){ echo('Femenino'); }?>
            </tr>
            <tr>
                <td class="celDtl">Ciudad</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getCiudad():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Direcci&oacute;n</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getDireccion():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Telefono y/o Celular</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getTelefono():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Perfil</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getPerfil():""); ?></td>
            </tr>
            <tr>
                <td class="celDtl">Email</td>
                <td class="celGen"><?php echo(($_GET["id"] != 0)?$usuario->getEmail():""); ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr align="right">
                <td colspan="2" class="celGen"><input type="button" id="btnCancelar" class="button" value="Volver" onclick="javascript:document.location.href='index.php?pag=registrados'"/></td>
            </tr>
        </tfoot>
	</table>
    
    
</form>