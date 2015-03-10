<?php if (!isset($_GET["msg"])) { ?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">

$(document).ready(function() {
		$("#formContacto").validate({ 
			rules: {
				txtNom: {
					required: true},
				txtApe: {
					required: true},
				txtDir: {
					required: true},
				txtPais:{
					required: true},
				txtCiudad: {
					required: true},
				txtTfno: {
					required: true},
				txtEmail:{
					required: true,
					email: true},
				txtAsunto:{
					required:true}
				},
			messages: {
				txtNom: {
					required: "El nombre es requerido"},
				txtApe: {
					required: "El apellido es requerido"},
				txtDir: {
					required: "La direccion es requerida"},
				txtPais:{
					required: "El pais es requerido"},
				txtCiudad: {
					required: "La ciudad es requerida"},
				txtTfno: {
					required: "El telefono es requerido"},
				txtEmail:{
					required: "El e-mail es requerido",
					email: "E-mail incorrecto"},
				txtAsunto:{
					required:"Determine el asunto de contacto"}
				}
		});
	
	});
	
	function clearData(){
		document.getElementById('txtNom').value = '';
		document.getElementById('txtApe').value = '';
		document.getElementById('txtDir').value = '';
		document.getElementById('txtPais').value = '';
		document.getElementById('txtCiudad').value = '';
		document.getElementById('txtTfno').value = '';
		document.getElementById('txtEmail').value = '';
		document.getElementById('txtAsunto').value = '';	
		document.getElementById('txtComent').value = '';	
	}
</script>
<style>
.error-message, label.error { color: #666; margin-left:5px;  display: block; font-size: 10px;font-weight:bold; top:0; }
</style>
<h3>Cont&aacute;ctenos</h3>
<div class="homeText">
    <p>Para nosotros es muy importante conocer su opini&oacute;n, por esto hemos creado un formulario de contacto en el cual usted podr&aacute; comunicarse con nosotros, estaremos complacidos en resolver sus inquietudes.</p>
    <br /><br />
        <form name="formContacto" id="formContacto" method="post" action="sendContacto.php">
        <table width="400" border="1" style="margin-left:30px;">
          <tr>
            <td width="112">Nombres:</td>
            <td width="272" align="right"><input name="txtNom" type="text" class="input" id="txtNom"/></td>
          </tr>
          <tr>
            <td>Apellidos:</td>
            <td align="right"><input name="txtApe" type="text" class="input" id="txtApe"/></td>
          </tr>
          <tr>
            <td>Direcci&oacute;n</td>
            <td align="right"><input name="txtDir" type="text" class="input" id="txtDir"/></td>
          </tr>
          <tr>
            <td>Pa&iacute;s:</td>
            <td align="right"><input name="txtPais" type="text" class="input" id="txtPais"/></td>
          </tr>
          <tr>
            <td>Ciudad:</td>
            <td align="right"><input name="txtCiudad" type="text" class="input" id="txtCiudad"/></td>
          </tr>
          <tr>
            <td>Tel&eacute;fono</td>
            <td align="right"><input name="txtTfno" type="text" class="input" id="txtTfno"/></td>
          </tr>
          <tr>
            <td>E-Mail:</td>
            <td align="right"><input name="txtEmail" type="text" class="input" id="txtEmail"/></td>
          </tr>
          <tr>
            <td>Asunto:</td>
            <td align="right"><input name="txtAsunto" type="text" class="input" id="txtAsunto"/></td>
          </tr>
          <tr>
            <td>Mensaje:</td>
            <td align="right"><textarea name="txtComent" id="txtComent" class="textArea"></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="right"><input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Enviar" /> - <input type="button" class="button" name="btnBorrar" id="btnBorrar" value="Borrar" onclick="javascript:clearData();" /></td>
          </tr>
        </table>
        </form>
            
</div>

<?php }
else{ ?>
<h3>Cont&aacute;ctenos</h3>
<div class="homeText">
    <p>Sr(a). <?php echo($_GET["msg"]); ?>.<br /><br />Gracias por contactarnos, muy pronto nos comunicaremos con usted.</p>
</div>
<?php } ?>