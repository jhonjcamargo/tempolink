<style>
	
.fondo
{
	width:300px; 
	height:220px; 
	background: url(/images/pattern_183.png)
}
.titulo
{
	color: #fff; 
}
.Links{
	text-decoration: none;
	color: #fff;
}
.boton{
	border-radius: 30px;
  	padding: 8px;
  	margin: 20px 50px;
  	height: auto;
  	width: 50%;
  	font-weight: bold;
  	text-decoration: none;
  	color: #ccc !important;
  	background: #AB3232;
}

</style>
<!--  <link href="style2.css" rel="stylesheet" type="text/css" /> -->
<div class="fondo">
<form name="frmLogin" id="frmLogin" method="post" action="index.php?pag=login">
	<h3 class="titulo">INICIAR SESION</h3>
	<div style="margin-bottom: 10px">
		<a><img style=" margin: -5px 7px;" alt="" src="/images/newimg/user.png"></a>
		<input type="text" placeholder="Usuario" name="txtUser" id="txtUser" class="input" style="width:60%;" />
	</div>
	<div>
		<a><img style=" margin: -5px 7px;" alt="" src="/images/newimg/lock112.png"></a>
		<input type="password" placeholder="Contraseña" name="txtPass" id="txtPass" class="input" style="width:60%;"/>
	</div>	
	<input type="submit" class="boton" name="btnEnviar" id="btnEnviar" value="Ingresar" />
	<!-- <a class="Links" style="text-align: left;" href="index.php?pag=registro" target="_blank">REGISTRO</a> --> 
	<a class="Links" style="text-align: right;" href="/admin/index.php" target="_blank">PORTAL ADMIN</a>
</form>
</div>