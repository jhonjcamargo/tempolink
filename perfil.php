<?php 
require_once("DAO/UsuarioRegistrado.php");

if( $_POST["IDUsuario"] != 0 ){

$genero = "";
$tipoDoc = "";
$activo = "";
$usuario = UsuarioRegistrado::cargar($_SESSION['idUsuario']);
if(count($usuario) != 0){
	$genero = $usuario->getGenero();
	$tipoDoc = $usuario->getTipoDoc();
	$activo = $usuario->getActivo();
}
?>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<h3>Mi perfil</h3>
<div class="homeText">
  <div id="Accordion1" class="Accordion" tabindex="0">
      <div class="AccordionPanel">
        <div class="AccordionPanelTab">Informaci&oacute;n personal</div>
        <div class="AccordionPanelContent">
        <form name="frmRegistro" id="frmRegistro" method="post" action="actualizarPerfil.php">
        <input type="hidden" id="IDUsuario" name="IDUsuario" class="input" value="<?php echo($_SESSION['idUsuario']); ?>" />
        <table id="tablaGen" style="width:630px;">
	    <tbody>
            <tr>
                <td class="item">Nombres</td>
                <td><input type="text" id="nombre" name="nombre" class="input" value="<?php echo($usuario->getNombre()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Apellidos</td>
                <td><input type="text" id="apellido" name="apellido" class="input" value="<?php echo($usuario->getApellido()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Tipo de Documento</td>
                <td>
					<select name="cboTipo" id="cboTipo" class="select_">
                        <option value="0">:: Tipo Documento ::</option>
                        <option value="CC" <?php if($tipoDoc != "" && $tipoDoc == 'CC'){ echo('selected="selected"'); }?>>C&eacute;dula</option>
                        <option value="CE" <?php if($tipoDoc != "" && $tipoDoc == 'CE'){ echo('selected="selected"'); }?>>C&eacute;dula de extrangeria</option>
                        <option value="PST" <?php if($tipoDoc != "" && $tipoDoc == 'PST'){ echo('selected="selected"'); }?>>Pasaporte</option>
                        <option value="TI" <?php if($tipoDoc != "" && $tipoDoc == 'TI'){ echo('selected="selected"'); }?>>Tarjeta de identidad</option>
                    </select>
				</td>
            </tr>
            <tr>
                <td class="item">N&uacute;mero de documento</td>
                <td><input type="text" id="documento" name="documento" class="input" readonly="readonly" value="<?php echo($usuario->getDocumento()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Fecha de nacimiento</td>
                <td><input type="text" id="nacimiento" name="nacimiento" class="input" readonly="readonly" value="<?php echo($usuario->getNacimiento()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Genero</td>
                <td>
                	<label for="rdgGenero_0"><input type="radio" name="rdgGenero" value="M" id="rdgGenero_0" <?php if($genero != "" && $genero == 'M'){ echo('checked="checked"'); }?>/>&nbsp;&nbsp;Masculino</label>
                	<label for="rdgGenero_1"><input type="radio" name="rdgGenero" value="F" id="rdgGenero_1" <?php if($genero != "" && $genero == 'F'){ echo('checked="checked"'); }?>/>&nbsp;&nbsp;Femenino</label>
            </tr>
            <tr>
                <td class="item">Ciudad</td>
                <td><input type="text" id="ciudad" name="ciudad" class="input" value="<?php echo($usuario->getCiudad()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Direcci&oacute;n</td>
                <td><input type="text" id="direccion" name="direccion" class="input" value="<?php echo($usuario->getDireccion()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Telefono y/o Celular</td>
                <td><input type="text" id="tfno" name="tfno" class="input" value="<?php echo($usuario->getTelefono()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Perfil</td>
                <td><textarea id="perfil" name="perfil" class="textArea"><?php echo($usuario->getPerfil()); ?></textarea></td>
            </tr>
            <tr>
                <td class="item">Email</td>
                <td><input type="text" id="email" name="email" class="input" value="<?php echo($usuario->getEmail()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Usuario</td>
                <td><input type="text" id="usuario" name="usuario" class="input" value="<?php echo($usuario->getUsuario()); ?>" /></td>
            </tr>
            <tr>
                <td class="item">Contrase&ntilde;a</td>
                <td><input type="password" id="pass" name="pass" class="input" value="" /></td>
            </tr>
            <tr>
                <td class="item" colspan="2" align="right"><input type="submit" id="btnActualizar" name="btnActualizar" value="Actualizar" class="button"/></td>
            </tr>
        </tbody>
        </table>
        </form>
        </div>
      </div>
      <div class="AccordionPanel">
        <div class="AccordionPanelTab">Informaci&oacute;n profesional</div>
        <div class="AccordionPanelContent">
        <form name="frmInfoAcad" id="frmInfoAcad" method="post" action="infoAcademica.php">
        <input type="hidden" id="IDUsuario" name="IDUsuario" class="input" value="<?php echo($_SESSION['idUsuario']); ?>" />
        <table id="tablaGen" style="width:630px;">
	    <tbody>
            <tr>
                <td class="item">Nivel de estudios</td>
                <td><input type="text" id="cboNivelE" name="cboNivelE" class="input"/></td>
            </tr>
            <tr>
                <td class="item">Titulo obtenido</td>
                <td><input type="text" id="txtTitulo" name="txtTitulo" class="input"/></td>
            </tr>
            <tr>
                <td class="item">Institucion</td>
                <td><input type="text" id="txtInstitucion" name="txtInstitucion" class="input"/></td>
            </tr>
            <tr>
                <td class="item" colspan="2" align="right"><input type="submit" id="btnEnviar" name="btnEnviar" value="Agregar" class="button"/></td>
            </tr>
        </tbody>
        </table>
        </form>
        <div id="infoAcad">
        	<?php include("infoAcademica.php") ?>
        </div>
        </div>
      </div>
      <div class="AccordionPanel">
        <div class="AccordionPanelTab">Informaci&oacute;n laboral</div>
        <div class="AccordionPanelContent">
        <form name="frmInfoLab" id="frmInfoLab" method="post" action="infoLaboral.php">
        <input type="hidden" id="IDUsuario" name="IDUsuario" class="input" value="<?php echo($_SESSION['idUsuario']); ?>" />
        <table id="tablaGen" style="width:630px;">
	    <tbody>
            <tr>
                <td class="item">Empresa</td>
                <td><input type="text" id="txtEmpresa" name="txtEmpresa" class="input"/></td>
            </tr>
            <tr>
                <td class="item">Cargo</td>
                <td><input type="text" id="txtCargo" name="txtCargo" class="input"/></td>
            </tr>
            <tr>
                <td class="item">Fecha de ingreso</td>
                <td>
                <select name="cboDiaI" id="cboDiaI" class="select_" style="width:80px;">
                	<option value="0">:: D&iacute;a ::</option>
                    <?php
						for($d=1;$d<=31;$d++)
						{
							if($d<10)
								$dd = "0" . $d;
							else
								$dd = $d;
							echo "<option value='$dd'>$dd</option>";
						}
					?>
            	</select>
              	<select name="cboMesI" id="cboMesI" class="select_" style="width:80px;">
                	<option value="0">:: Mes ::</option>
                    <?php
						for($m = 1; $m<=12; $m++)
						{
							if($m<10)
								$me = "0" . $m;
							else
								$me = $m;
							switch($me)
							{
								case "01": $mes = "Enero"; break;
								case "02": $mes = "Febrero"; break;
								case "03": $mes = "Marzo"; break;
								case "04": $mes = "Abril"; break;
								case "05": $mes = "Mayo"; break;
								case "06": $mes = "Junio"; break;
								case "07": $mes = "Julio"; break;
								case "08": $mes = "Agosto"; break;
								case "09": $mes = "Septiembre"; break;
								case "10": $mes = "Octubre"; break;
								case "11": $mes = "Noviembre"; break;
								case "12": $mes = "Diciembre"; break;			
							}
							echo "<option value='$me'>$mes</option>";
						}
					?>
            	</select>
              	<select name="cboAnoI" id="cboAnoI" class="select_" style="width:80px;">
                	<option value="0">:: A&ntilde;o ::</option>
                    <?php
						$tope = date("Y");
						for($a= 1900; $a<=$tope; $a++)
							echo "<option value='$a'>$a</option>"; 
					?>
            	</select>
                </td>
            </tr>
            <tr>
                <td class="item">Fecha de Retiro</td>
                <td>
                <select name="cboDiaS" id="cboDiaS" class="select_" style="width:80px;">
                	<option value="0">:: D&iacute;a ::</option>
                    <?php
						for($d=1;$d<=31;$d++)
						{
							if($d<10)
								$dd = "0" . $d;
							else
								$dd = $d;
							echo "<option value='$dd'>$dd</option>";
						}
					?>
            	</select>
              	<select name="cboMesS" id="cboMesS" class="select_" style="width:80px;">
                	<option value="0">:: Mes ::</option>
                    <?php
						for($m = 1; $m<=12; $m++)
						{
							if($m<10)
								$me = "0" . $m;
							else
								$me = $m;
							switch($me)
							{
								case "01": $mes = "Enero"; break;
								case "02": $mes = "Febrero"; break;
								case "03": $mes = "Marzo"; break;
								case "04": $mes = "Abril"; break;
								case "05": $mes = "Mayo"; break;
								case "06": $mes = "Junio"; break;
								case "07": $mes = "Julio"; break;
								case "08": $mes = "Agosto"; break;
								case "09": $mes = "Septiembre"; break;
								case "10": $mes = "Octubre"; break;
								case "11": $mes = "Noviembre"; break;
								case "12": $mes = "Diciembre"; break;			
							}
							echo "<option value='$me'>$mes</option>";
						}
					?>
            	</select>
              	<select name="cboAnoS" id="cboAnoS" class="select_" style="width:80px;">
                	<option value="0">:: A&ntilde;o ::</option>
                    <?php
						$tope = date("Y");
						for($a= 1900; $a<=$tope; $a++)
							echo "<option value='$a'>$a</option>"; 
					?>
            	</select>
                </td>
            </tr>
            <tr>
                <td class="item">Descripcion del cargo</td>
                <td><textarea id="txtDescCargo" name="txtDescCargo" class="textArea"></textarea></td>
            </tr>
            <tr>
                <td class="item" colspan="2" align="right"><input type="submit" id="btnEnviar" name="btnEnviar" value="Agregar" class="button"/></td>
            </tr>
        </tbody>
        </table>
        </form>
        <div id="infoLab">
        	<?php include("infoLaboral.php") ?>
        </div>
        </div>
      </div>
  </div>
</div>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>

<?php } else{ ?>
<div class="cajaTexto">
    <h3>Perfil</h3>
    <div class="homeText">Para actualizar su perfil debe estar registrado y acceder con el usuario y contraseña proporcionado</div>
</div>

<?php } ?>
