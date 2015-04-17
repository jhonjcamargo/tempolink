<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php if (!isset($_GET["msg"])) { ?>
<style>
.formcontactos {
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

.formcontactos label {
	width: 78px;
	height: auto;
	float: left;
	font-size: 18px;
	font-family: 'helveticac';
	color: #999;
	margin: 29px 15px 0 15px;
}

.formcontactos input[type="text"] {
	width: 190px;
	height: 22px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formcontactos textarea {
	width: 190px;
	height: 89px;
	float: left;
	background-color: #dfdfe1;
	border-style: none;
	border-radius: 0;
	margin-top: 30px;
}

.formcontactos input[type="submit"], input[type="button"] {
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

#map-canvas {
	width: 470px;
	height: 491px;
	float: left;
	margin: 0 0 0 0;
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
					/*,
				txtComent: {
					required:true}*/
				},
			messages: {
				txtNom: {
					required: "*"},
				txtApe: {
					required: "*"},
				txtDir: {
					required: "*"},
				txtPais:{
					required: "*"},
				txtCiudad: {
					required: "*"},
				txtTfno: {
					required: "*"},
				txtEmail:{
					required: "*",
					email: "*"},
				txtAsunto:{
					required:"*"}
					/*,
				txtComent:{
					required:"*"}*/
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
<script type='text/javascript'>
var map;
var prueba = '/images/redes/pin.png';

var mapOptions = {
    zoom : 11,
    center : {lat: 4.664334907790714, lng: -74.0548266443443},
};
                	
function initialize() {
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    addMarker(4.619998, -74.067699);
	map.setOptions({styles: styleArray});
	
}
 
function addMarker(lat,lon){
    new google.maps.Marker({
        position : new google.maps.LatLng(lat,lon),
        map : map,
        icon : prueba,
        draggable:false,
        animation: google.maps.Animation.DROP
    });    
}
</script>
<script>
$(function(){
    initialize();
});
</script>
<h3>Contáctenos</h3>
<div class="homeText">
	<p>Para nosotros es muy importante conocer su opinión, por esto hemos
		creado un formulario de contacto en el cual usted podrá comunicarse
		con nosotros, estaremos complacidos en resolver sus inquietudes.</p>
	<p>Nuestro portal le asegúra que sus datos estan protegidos por la Ley 1581 de 2012 Decreto 1377 de 2013, Para saber mas sobre esta pagina consultelo haciendo <a style="text-decoration: none;" href="http://www.sic.gov.co/drupal/sobre-la-proteccion-de-datos-personales" target="_blank">click aqui</a>. </p>	
	<br />
	<br />
	<form class="formcontactos" name="formContacto" id="formContacto"
		method="post" action="sendContacto.php">
		<label>Nombres:</label> <input name="txtNom" type="text" class="input" id="txtNom" />
		<label>Apellidos:</label> <input name="txtApe" type="text" class="input" id="txtApe" /> <label>Dirección</label> 
		<input name="txtDir" type="text" class="input" id="txtDir" /> <label>País:</label>
		<input name="txtPais" type="text" class="input" id="txtPais" /> <label>Ciudad:</label>
		<input name="txtCiudad" type="text" class="input" id="txtCiudad" /> <label>Teléfono</label>
		<input name="txtTfno" type="text" class="input" id="txtTfno" /> <label>E-Mail:</label>
		<input name="txtEmail" type="text" class="input" id="txtEmail" /> <label>Asunto:</label>
		<input name="txtAsunto" type="text" class="input" id="txtAsunto" /> <label>Mensaje:</label>
		<textarea name="txtComent" id="txtComent" class="textArea"></textarea>
		<input type="submit" class="button" name="btnEnviar" id="btnEnviar"
			value="Enviar" /> <input type="button" class="button"
			name="btnBorrar" id="btnBorrar" value="Borrar"
			onclick="javascript:clearData();" />
		</td>
	</form>

	<div id="map-canvas"></div>
</div>
<!-- mibew button --><a href="/mibew/client.php?locale=es&amp;style=default" target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open(&#039;/mibew/client.php?locale=es&amp;style=default&amp;url=&#039;+escape(document.location.href)+&#039;&amp;referrer=&#039;+escape(document.referrer), 'mibew', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;"><img src="/mibew/b.php?i=mblue&amp;lang=es" border="0" width="177" height="61" alt="" style="margin-top: 15px"/></a><!-- / mibew button -->
<?php }
else{ ?>
<h3>Contáctenos</h3>
<div class="homeText">
	<p>Sr(a). <?php echo($_GET["msg"]); ?>.<br />
		<br />Gracias por contactarnos, muy pronto nos comunicaremos con usted.
	</p>
</div>
<?php } ?>

