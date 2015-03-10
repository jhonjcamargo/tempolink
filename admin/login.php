<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#formLogin").validate({ 
			rules: {
				user: {
					required: true},
				password: {
					required: true},
				cboTipo:{
					required:true}
				},
			messages: {
				user: {
					required: "El nombre de usuario es requerido"},
				password: {
					required: "La contrase&ntilde;a es requerida"},
				cboTipo:{
					required:"El perfil es requerido"}
				}
		});
	
	});
</script>
<style>
.error-message, label.error { color: #666; margin-left:5px;  display: block; font-size: 10px;font-weight:bold; top:0; }
</style>
<div id="container">
	<div id="navigation_login">
	</div>
	<ul id="content">
		<li class="left">
			<div id="boxes_inner">
				<div class="box_left">
					<span class="center"></span>
					<span class="bottom">&nbsp;</span>
				</div>
				<div class="box_right">
					<span class="center">
						<div class="text_inner">
							<h3>INGRESO DE USUARIO</h3>
						  Bienvenido al sistema de Integracion de TempoLink.<br/>
							Por favor ingrese su nombre de usuario y contrase&ntilde;a y determine el tipo de perfil para tener acceso a la herramienta.
						    <br />
                            Si olvido su contrase&ntilde;a, por favor haga click <strong><a href="recordarPass.php">aqu&iacute;</a></strong>
						</div>
						<div id="clear">
							<div id="form">
								<form name="formLogin" id="formLogin" action="index.php" method="post" >
									<label>Usuario:<br /><input name="user" id="user" type="text" class="input" autocomplete="off" /></label>
									<br />
									<label>Contrase&ntilde;a:<br /><input name="password" id="password" type="password" class="input" autocomplete="off"/></label>
									<br />
                                    <label>Perfil:</label><br />
                                    <select id="cboTipo" name="cboTipo" class="select_" style="margin:0;">
                                    	<option value="">:: Seleccione Perfil ::</option>
                                    	<option value="0">Empleado</option>
                                    	<option value="1">Empresa</option>
                                    </select>
                                    <br />
									<input type="submit" class="button" name="ingresar" id="ingresar" value="Ingresar" />
								</form>
							</div>
							<br />
						</div>
					</span>
					<span class="bottom">&nbsp;</span>
				</div>
			</div>
		</li>
	</ul>
	<div id="footer"><?php include("footer.php"); ?></div>
</div><!-- container -->
<?php
if( isset($_POST['user']) && $error ) {?>
<script>mostrarMensaje("Usuario o contrase&ntilde;a errada","La combinaci&oacute;n de usuario y contrase&ntilde;a es incorrecta.","");</script> 
<?php
}
if(isset($_GET['msg']) && trim($_GET['msg']) == 'enviado'){
	echo('SIIII')
	?> <script>mostrarMensaje("Mail enviado","Hemos enviado un correo electronico con su contrase&ntilde;a nuevamente","");</script> 
<?php 
}
?>