<style>
.formregistro {
	width: 60%;
	height: 100%;
	float: left;
	margin: 0 25%;
	-webkit-box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	-moz-box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	box-shadow: 0px 3px 9px 0.5px rgba(0, 0, 0, 0.43);
	overflow: hidden;
}

.formregistro label {
	width: 200px;
	height: auto;
	float: left;
	font-size: 18px;
	font-family: 'helveticac';
	color: #999;
	margin: 29px 15px 0 15px;
}

.formregistro input[type="text"], input[type="password"] {
	width: 245px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.typedoc {
	width: 245px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.slcday {
	width: 55px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
	margin-right: 3px;
}
.slcmon {
	width: 120px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
	margin-right: 3px;
}
.slcyear {
	width: 65px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formregistro textarea {
	width: 245px;
	height: 100px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formregistro input[type="submit"], input[type="button"] {
	width: 100px;
	height: 24px;
	background-color: #AB3232;
	border-style: none;
	border-radius: 4px;
	margin: 17px 17px;
	font-family: 'helveticac';
	font-size: 18px;
	color: #fff !important;
}

.error-message, p.error {
	float: left;
	height:0;
	color: red;
	margin: 29px 0 25px 16px ;
	display: block;
	font-size: 17px;
	font-weight: bold;
	top: 0;
}
</style>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">

$(document).ready(function() {
		$("#frmRegistro").validate({ 
			rules: {
				txtNombre: {
					required: true},
				txtApellido: {
					required: true},
				txtMail: {
					required: true,
					email: true},
				txtUsuario:{
					required: true},
				txtPass:{
					required: true},
				txtConfPass:{
					required: true},
				txtDocumento: {
					required: true},
				txtCiudad:{
					required: true},
				txtTfno: {
					required: true},
				txtDireccion:{
					required:true},
				txtPerfil: {
					required:true}
				},
			messages: {
				txtNombre: {
					required: "*"},
				txtApellido: {
					required: "*"},
				txtMail: {
					required: "*",
					email: "*"},
				txtUsuario:{
					required: "*"},
				txtPass:{
					required: "*"},
				txtConfPass:{
					required: "*"},
				txtDocumento: {
					required: "*"},	
				txtCiudad: {
					required: "*"},
				txtTfno: {
					required: "*"},
				txtDireccion:{
					required: "*"},
				txtPerfil: {
					required: "*"}
				}
		});
	
	});

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
	<p>Todos los campos son obligatorios. </p>
	<br />
	<br />
    <form class="formregistro" name="frmRegistro" id="frmRegistro" method="post" action="sendRegistro.php">
        <label>Nombres:</label>
       	<input type="text" name="txtNombre" id="txtNombre" class="input" />
        <label>Apellidos</label>
        <input type="text" name="txtApellido" id="txtApellido" class="input"/>
        <label>Email:</label>
        <input type="text" name="txtMail" id="txtMail" class="input"/>
        <label>Usuario:</label>
        <input type="text" name="txtUsuario" id="txtUsuario" class="input"/>
        <label>Contraseña:</label>
        <input type="password" name="txtPass" id="txtPass" class="input"/>
        <label>Confirmar contraseña:</label>
        <input type="password" name="txtConfPass" id="txtConfPass" class="input"/>
        <label>Tipo de documento:</label>
		<select name="cboTipo" id="cboTipo" class="select_ typedoc">
<!--         	<option value="0">Tipo Documento</option> -->
            <option value="CC">Cédula</option>
            <option value="CE">Cédula de extrangeria</option>
            <option value="PST">Pasaporte</option>
            <option value="TI">Tarjeta de identidad</option>
      	</select>
      	<label>Número de documento:</label>
        <input type="text" name="txtDocumento" id="txtDocumento" class="input"/>
		<label>Fecha de nacimiento</label>
		<select name="cboDia" id="cboDia" class="select_ slcday">
<!--         	<option value="0">Día</option> -->
	        <?php for($d=1;$d<=31;$d++){
	        		if($d<10)
						$dd = "0" . $d;
					else
						$dd = $d;
					echo "<option value='$dd'>$dd</option>";
			}?>
		</select>
        <select name="cboMes" id="cboMes" class="select_ slcmon">
<!--         	<option value="0">Mes</option> -->
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
        <select name="cboAno" id="cboAno" class="select_ slcyear">
<!--           	<option value="0">Año</option> -->
            <?php $tope = date("Y");
               	for($a= 1950; $a<=$tope; $a++)
					echo "<option value='$a'>$a</option>"; 
			?>
        </select>
        <label>Genero:</label>
        <label for="rdgGenero_0" style="width: 100px;">
        	<input type="radio" name="rdgGenero" value="M" id="rdgGenero_0" checked="checked" />
        	Masculino
        </label>
        <label for="rdgGenero_1" style="width: 100px;">
        	<input type="radio" name="rdgGenero" value="F" id="rdgGenero_1"  />
        	Femenino
       	</label>
        <label>Ciudad:</label>
        <input type="text" name="txtCiudad" id="txtCiudad" class="input"/>
        <label>Dirección de residencia:</label>
        <input type="text" name="txtDireccion" id="txtDireccion" class="input"/>
        <label>Telefno y/o Celular:</label>
        <input type="text" name="txtTfno" id="txtTfno" class="input"/>
        <label>Perfil Profesional:</label>
        <textarea name="txtPerfil" id="txtPerfil" class="textArea"></textarea>
        
        <input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Enviar" style="margin-left: 25%;" />
        <input type="button" class="button" name="btnBorrar" id="btnBorrar" value="Borrar" onclick="javascript:clearData();" />
    </form>    
</div>