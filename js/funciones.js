/**
 * Encuentra el alto de la pagina que ha bajado con el scroll
 * @return int
 */
function getPageScroll(){
	var yScroll;

	if (self.pageYOffset) { //Firefox, Safari, Opera
		yScroll = self.pageYOffset;
	}
    else if (document.documentElement && document.documentElement.scrollTop){ // IE 6
		yScroll = document.documentElement.scrollTop;
	}
    else if (document.body) { // otros IE
		yScroll = document.body.scrollTop;
	}
	return yScroll;
}

/**
 * Encuentra el tama&ntilde;o de la pagina
 */
function getPageSize(){
	var xScroll, yScroll;

	if (window.innerHeight && window.scrollMaxY) {
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	}
    else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	}
    else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}

	var windowWidth, windowHeight;
	if (self.innerHeight) {	// Firefox, Safari, Opera
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	}
    else if (document.documentElement && document.documentElement.clientHeight) { // IE 6
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	}
    else if (document.body) { // otros IE
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}

	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else {
		pageHeight = yScroll;
	}

	if(xScroll < windowWidth){
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}

	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight)
	return arrayPageSize;
}

/**
 * Oculta el mensaje de alerta
 */
function ocultarMensaje(){
    document.getElementById("overlay").style.display = "none";
}

/**
 * Configura y muestra el mensje de alerta
 */
function mostrarMensaje( _titulo, _texto, _dir, _idi ){
	var arrayPageSize = getPageSize();
	var arrayPageScroll = getPageScroll();
    var lightboxTop = arrayPageScroll + ((arrayPageSize[3] - 35 - 120) / 2);
    var lightboxLeft = ((arrayPageSize[0] - 200) / 2);

    document.getElementById("mensaje").style.top = (lightboxTop < 0) ? "0px" : lightboxTop + "px";
    document.getElementById("mensaje").style.left = (lightboxLeft < 0) ? "0px" : lightboxLeft + "px";
    document.getElementById("tituloMensaje").innerHTML = _titulo;
    document.getElementById("textoMensaje").innerHTML = _texto;
    if(_idi == "es"){
        document.getElementById("aceptarMensaje").value = "Aceptar";
    }
    else{
        document.getElementById("aceptarMensaje").value = "Accept";
    }
    document.getElementById("overlay").style.height = (arrayPageSize[1] + 'px');
    document.getElementById("overlay").style.display = "block";
    document.getElementById("aceptarMensaje").focus();
    document.getElementById("aceptarMensaje").onclick = function() { 
        ocultarMensaje();
        if( _dir != "" ){
            irA( _dir );
        }
    }
}

/**
 * Valida si los campos del formulario est&aacute;n diligenciados
 */
function validarLogin(){
    if( document.formLogin.user.value == "" ){
        mostrarMensaje("Error en el usuario", "Ingrese su usuario para ingresar al sistema", "");
        return false;
    }
    if( document.formLogin.password.value == "" ){
        mostrarMensaje("Error en la contrase&ntilde;a", "Ingrese su contrase&ntilde;a para ingresar al sistema", "");
        return false;
    }
    return true;
}

/**
 * Cambia la p&aacute;gina actual del navegador
 */
function irA( _dir ){
    document.location.href = _dir;
}

function sobrecampo(_div, campo, nombre, tipo, value, fr)
{
    if(campo.value == value)
    {
        document.getElementById(_div).innerHTML='<input type="'+tipo+'" class="input_form" name="'+nombre+'" onblur="fueracampo(\''+_div+'\',this,\''+nombre+'\',\'text\',\''+value+'\',\''+fr+'\');"/>';
        eval("document."+fr+"."+nombre+".focus();");
        eval("document."+fr+"."+nombre+".select();");
    }

}
function fueracampo(_div, campo, nombre, tipo, value,fr)
{
    if(campo.value == '')
    {
        document.getElementById(_div).innerHTML='<input type="'+tipo+'" class="input_form" name="'+nombre+'" value="'+value+'" onfocus="sobrecampo(\''+_div+'\',this,\''+nombre+'\',\'password\',\''+value+'\',\''+fr+'\');" />';
    }

}