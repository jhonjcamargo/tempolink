<link href="style.css" rel="stylesheet" type="text/css" />
<div style="width:300px; height:220px;">
<form name="frmLogin" id="frmLogin" method="post" action="index.php?pag=login">
    <table id="tablaGen" style="width:300px;" align="center">
		<tr>
        	<td class="item" colspan="2" align="center"><h3>Ingresar a mi cuenta</h3></td>
        </tr>
        <tr>
            <td class="item">Usuario:</td>
            <td><input type="text" name="txtUser" id="txtUser" class="input" style="width:150px;"  /></td>
        </tr>
        <tr>
            <td class="item">Contrase&ntilde;a:</td>
            <td><input type="password" name="txtPass" id="txtPass" class="input" style="width:150px;"/></td>
        </tr>
        <tr>
        	<td class="item" align="right" colspan="2"><input type="submit" class="button" name="btnEnviar" id="btnEnviar" value="Ingresar" /></td>
        </tr>
    </table>
</form>
</div>