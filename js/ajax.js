/**
 * Funci&oacute;n que crea un objeto que ser&aacute; el que envie y reciba
 * informaci&oacute;n de manera as&iacute;ncrona al servidor Web
 * @return Objeto de comunicaci&oacute;n AJAX
 */
function crearXMLHttpRequest(){
    var objeto = null;

    if( window.ActiveXObject ){ //si es Internet Explorer
        objeto = new ActiveXObject( "Microsoft.XMLHTTP" );
    }
    else { //Si es Mozilla Firefox u otros compatible a Nestcape
        if( window.XMLHttpRequest ) {
            objeto = new XMLHttpRequest();
        }
    }
    return objeto;
}

/**
 * Funci&oacute;n que realiza la carga as&iacute;ncrona de informaci&oacute;n utilizando AJAX
 * @param url       p&aacute;gina que se va a cargar
 * @param datos     datos que se le enviar&aacute;n a la p&aacute;gina por el m&eacute;todo post
 * @param funcion   determina si la p&aacute;gina se cargar&aacute; como HTML o se evaluar&aacute; como javascript
 * @param cargarEn  elemento en donde se cargar&aacute; la respuesta de la p&aacute;gina
 */
function enviar( url, datos, funcion, cargarEn ) {
    if( url == "" ) {
        return;
    }

    conexion = crearXMLHttpRequest(); //crea la conexi&oacute;n as&iacute;ncrona al servidor

    if(funcion == 'cargar') {
        div = document.getElementById(cargarEn);
        conexion.onreadystatechange = cargarDatos;
		
    }
    if(funcion == 'evaluar') {
        conexion.onreadystatechange = ejecutarAccion;
    }

    conexion.open('POST', url, true);
    conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    conexion.send( datos );
	

}

/**
 * Inserta dentro del <div></div> especificado por div el resultado de la carga
 * as&iacute;ncrona de una determinada p&aacute;gina
 */
function cargarDatos() {
    if( conexion.readyState == 4 ) {
        div.innerHTML = conexion.responseText;
    }
    if( conexion.readyState == 1 ) {
        div.innerHTML = '<img src="images/loading.gif">';
    }
}

/**
 * Evalua como javascript el resultado de la carga as&iacute;ncrona de una determinada
 * p&aacute;gina
 */
function ejecutarAccion() {
    if( conexion.readyState == 4 ) {
        eval(conexion.responseText);
    }
}

/**
 * VARIABLES
 */
var conexion;	//Conexion con el servidor Web usando AJAX
var div;	//Elemento div del documento HTML en donde se cargar&aacute; la respuesta as&iacute;ncrona