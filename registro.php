<script type="text/javascript">

function clearData(){
	document.getElementById('txtNombre').value = '';
	document.getElementById('txtApellido').value = '';
	document.getElementById('cboTipo').selectedIndex = 0;
	document.getElementById('txtDocumento').value = '';
	document.getElementById('cboDia').selectedIndex = 0;
	document.getElementById('cboMes').selectedIndex = 0;
	document.getElementById('cboAno').selectedIndex = 0;
	document.getElementById('txtCiudad').value = '';
	document.getElementById('txtDireccion').value = '';
	document.getElementById('txtTfno').value = '';	
	document.getElementById('txtPerfil').value = '';	
	document.getElementById('txtMail').value = '';	
	document.getElementById('txtUsuario').value = '';	
	document.getElementById('txtPass').value = '';	
	document.getElementById('txtConfPass').value = '';	
}

</script>
<h3>Registrate en TempoLink</h3>
<div class="homeText">
    <form name="frmRegistro" id="frmRegistro" method="post" action="sendRegistro.php">
        <table width="500" id="tablaGen" border="1">
          <tr>
            <td class="item">Nombres:</td>
            <td><input type="text" name="txtNombre" id="txtNombre" class="input" /></td>
          </tr>
          <tr>
            <td class="item">Apellidos</td>
            <td><input type="text" name="txtApellido" id="txtApellido" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Tipo de documento:</td>
            <td>
            	<select name="cboTipo" id="cboTipo" class="select_">
                	<option value="0">:: Tipo Documento ::</option>
                    <option value="CC">C&eacute;dula</option>
                    <option value="CE">C&eacute;dula de extrangeria</option>
                    <option value="PST">Pasaporte</option>
                    <option value="TI">Tarjeta de identidad</option>
            	</select>
            </td>
          </tr>
          <tr>
            <td class="item">N&uacute;mero de documento:</td>
            <td><input type="text" name="txtDocumento" id="txtDocumento" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Fecha de nacimiento</td>
            <td>
              	<select name="cboDia" id="cboDia" class="select_" style="width:80px;">
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
              	<select name="cboMes" id="cboMes" class="select_" style="width:80px;">
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
              	<select name="cboAno" id="cboAno" class="select_" style="width:80px;">
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
            <td class="item">Genero:</td>
            <td>
              <label for="rdgGenero_0"><input type="radio" name="rdgGenero" value="M" id="rdgGenero_0" />&nbsp;&nbsp;Masculino</label>
              <label for="rdgGenero_1"><input type="radio" name="rdgGenero" value="F" id="rdgGenero_1" />&nbsp;&nbsp;Femenino</label>
            </td>
          </tr>
          <tr>
            <td class="item">Ciudad:</td>
            <td><input type="text" name="txtCiudad" id="txtCiudad" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Direcci&oacute;n de residencia:</td>
            <td><input type="text" name="txtDireccion" id="txtDireccion" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Telefno y/o Celular:</td>
            <td><input type="text" name="txtTfno" id="txtTfno" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Perfil Profesional:</td>
            <td><textarea name="txtPerfil" id="txtPerfil" cols="45" rows="5" class="textArea"></textarea></td>
          </tr>
          <tr>
            <td class="item">Email:</td>
            <td><input type="text" name="txtMail" id="txtMail" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Usuario:</td>
            <td><input type="text" name="txtUsuario" id="txtUsuario" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Contrase&ntilde;a:</td>
            <td><input type="password" name="txtPass" id="txtPass" class="input"/></td>
          </tr>
          <tr>
            <td class="item">Confirmar contrase&ntilde;a:</td>
            <td><input type="password" name="txtConfPass" id="txtConfPass" class="input"/></td>
          </tr>
          <tr>
            <td colspan="2" align="right" class="item"><input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Enviar" /> - <input type="button" class="button" name="btnBorrar" id="btnBorrar" value="Borrar" onclick="javascript:clearData();" /></td>
          </tr>
        </table>
    </form>
    
</div>