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
						  Bienvenido al sistema de administracion de contenidos de <b>www.tempolink.com.co</b>.<br/>
							Por favor ingrese su nombre de usuario y contrase&ntilde;a para tener acceso a la herramienta.
						</div>
						<div id="clear">
							<div id="form">
								<form name="formLogin" action="index.php" method="post" onsubmit="return validarLogin();">
									<label>Usuario:<br /><input name="user" type="text" class="input" /></label>
									<br />
									<label>Contrase&ntilde;a:<br /><input name="password" type="password" class="input"/></label>
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
<script>mostrarMensaje("Usuario o contrase&ntilde;a errada","La combinaci&oacute;n de usuario y contrase&ntilde;a es incorrecta.","");</script> <?php
}
?>