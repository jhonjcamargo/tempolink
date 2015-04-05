<style>
.formregistro {
	width: 322px;
	height: 610px;
	float: left;
	margin: 0 71px 0 30px;
	background: url("../images/basic/trans_back_form.png") repeat;
	-webkit-box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	-moz-box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	overflow: hidden;
}

.formregistro label {
	width: 78px;
	height: auto;
	float: left;
	font-size: 18px;
	font-family: 'helveticac';
	color: #999;
	margin: 29px 15px 0 15px;
}

.formregistro input[type="text"] {
	width: 190px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formregistro textarea {
	width: 190px;
	height: 89px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formregistro input[type="submit"], input[type="button"] {
	width: 69px;
	height: 24px;
	float: right;
	background-color: #AB3232;
	border-style: none;
	border-radius: 4px;
	margin: 17px 17px 0 0;
	font-family: 'helveticac';
	font-size: 18px;
	color: #fff !important;
	padding: 1px 10px;
}

.error-message, label.error {
	color: #666;
	margin-left: 5px;
	display: block;
	font-size: 10px;
	font-weight: bold;
	top: 0;
}
</style>
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
	<p>Para registrarse en nuestro portal por favor completrar el siguiente formulario.</p>
	<br />
	<br />
    <form class="formregistro" name="frmRegistro" id="frmRegistro" method="post" action="sendRegistro.php">
        <label>Nombres:</label>
       	<input type="text" name="txtNombre" id="txtNombre" class="input" />
        <label>Apellidos</label>
        <input type="text" name="txtApellido" id="txtApellido" class="input"/>
        <label>Tipo de documento:</label>
		<select name="cboTipo" id="cboTipo" class="select_">
        	<option value="0">Tipo Documento</option>
            <option value="CC">Cédula</option>
            <option value="CE">Cédula de extrangeria</option>
            <option value="PST">Pasaporte</option>
            <option value="TI">Tarjeta de identidad</option>
      	</select>
      	<label>Número de documento:</label>
        <input type="text" name="txtDocumento" id="txtDocumento" class="input"/>
		<label>Fecha de nacimiento</label>
		<select name="cboDia" id="cboDia" class="select_" style="width:80px;">
        	<option value="0">Día</option>
	        <?php for($d=1;$d<=31;$d++){
	        		if($d<10)
						$dd = "0" . $d;
					else
						$dd = $d;
					echo "<option value='$dd'>$dd</option>";
			}?>
		</select>
        <select name="cboMes" id="cboMes" class="select_" style="width:80px;">
        	<option value="0">Mes</option>
            <?php for($m = 1; $m<=12; $m++){
            		if($m<10)
						$me = "0" . $m;
					else
						$me = $m;
					switch($me){
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
			}?>
        </select>
        <select name="cboAno" id="cboAno" class="select_" style="width:80px;">
          	<option value="0">Año</option>
            <?php $tope = date("Y");
               	for($a= 1900; $a<=$tope; $a++)
					echo "<option value='$a'>$a</option>"; 
			?>
        </select>
        <label>Genero:</label>
        <label for="rdgGenero_0"><input type="radio" name="rdgGenero" value="M" id="rdgGenero_0" />Masculino</label>
        <label for="rdgGenero_1"><input type="radio" name="rdgGenero" value="F" id="rdgGenero_1" />Femenino</label>
        <label>Ciudad:</label>
        <input type="text" name="txtCiudad" id="txtCiudad" class="input"/>
        <label>Dirección de residencia:</label>
        <input type="text" name="txtDireccion" id="txtDireccion" class="input"/>
        <label>Telefno y/o Celular:</label>
        <input type="text" name="txtTfno" id="txtTfno" class="input"/>
        <label>Perfil Profesional:</label>
        <textarea name="txtPerfil" id="txtPerfil" class="textArea"></textarea>
        <label>Email:</label>
        <input type="text" name="txtMail" id="txtMail" class="input"/>
        <label>Usuario:</label>
        <input type="text" name="txtUsuario" id="txtUsuario" class="input"/>
        <label>Contraseña:</label>
        <input type="password" name="txtPass" id="txtPass" class="input"/>
        <label>Confirmar contraseña:</label>
        <input type="password" name="txtConfPass" id="txtConfPass" class="input"/>
        <input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Enviar" /> - <input type="button" class="button" name="btnBorrar" id="btnBorrar" value="Borrar" onclick="javascript:clearData();" />
    </form>    
</div>