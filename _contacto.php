<?php

if (isset ( $_POST ["btnEnviar"] ) ) {
    $message = "<b>Nombres:</b> " . $_POST ['nombres'] . "<br>";
    $message .= "<b>Apellidos:</b> " . $_POST ['apellidos'] . "<br>";
    $message .= "<b>E-mail:</b> " . $_POST ['email'] . "<br>";
    $message .= "<b>Comentarios:</b> " . $_POST ['comentarios'];

    $ok = @mail ( "marketing@axa-assistance.com.co", "Nuevo contacto", $message, "From: ".$_POST['email'].PHP_EOL."Content-Type: text/html; charset=utf-8" );
}

/* marketing@axa-assistance.com.co */
?>
<script type="text/javascript">
    function validar(){
        var msg = "";
        if( document.formContacto.nombres.value == ""  || document.formContacto.nombres.value=="Nombres:"){
                msg = "Ingrese los nombres";
            mostrarMensaje("Error al Ingresar",msg,"");
            document.formContacto.nombres.select();
            return false;
        }
        if( document.formContacto.apellidos.value == "" || document.formContacto.apellidos.value=="Apellido:"){
                msg = "Ingrese los apellidos";
            mostrarMensaje("Error al Ingresar",msg,"");
            document.formContacto.apellidos.select();
            return false;
        }
        if( document.formContacto.email.value == ""  || document.formContacto.email.value=="Correo Electrónico:") {
                msg = "Ingrese el email";
            mostrarMensaje("Error al Ingresar",msg,"");
            document.formContacto.email.select();
            return false;
        }
        if( document.formContacto.comentarios.value == "" || document.formContacto.comentarios.value=="Comentarios:") {
                msg = "Ingrese los comentarios";
            mostrarMensaje("Error al Ingresar",msg,"");
            document.formContacto.comentarios.select();
            return false;
        }
        return true;
    }
</script>
<h2><?php echo($paginas); ?></h2>
<div class="right_info">                
    <div class="detail">       
		<?php
        if (isset ( $_POST ["btnEnviar"] ) ) {?>
        <h4 id="divMensajeEnviado">Mensaje enviado correctamente.</h4><?php
        }
        ?>	
        <p>Para nosotros es muy importante conocer su opini&oacute;n, por esto hemos creado un formulario de contacto en el cual usted podr&aacute; comunicarse con nosotros, estaremos complacidos en resolver sus inquietudes.</p>
        <br />
        <br />
        <form name="formContacto" id="formContacto" method="post" action="" onsubmit="return validar()">
                <label>
                <input name="nombres" type="text" class="txt" id="name" value="Nombres:" onfocus="if(this.value == 'Nombres:'){this.value='';}" onblur="if(this.value == ''){this.value = 'Nombres:'}" />
                </label>
                <br /><br />
                <label>
                <input name="apellidos" type="text" class="txt" id="lname" value="Apellido:" onfocus="if(this.value == 'Apellido:'){this.value='';}" onblur="if(this.value == ''){this.value = 'Apellido:'}" />
                </label>
                <br /><br />
                <label>
                <input name="email" type="text" class="txt" id="mail" value="Correo electr&oacute;nico:" onfocus="if(this.value == 'Correo electr&oacute;nico:'){this.value='';}" onblur="if(this.value == ''){this.value = 'Correo electr&oacute;nico:'}" />
                </label>
                <br /><br />
                <label>
                <textarea name="comentarios" id="comments" class="txtArea" onfocus="if(this.value == 'Comentarios:'){this.value='';}" onblur="if(this.value == ''){this.value = 'Comentarios:'}">Comentariossss:</textarea>
                </label>
                <br /><br />
            <input type="submit" class="src_enviar" name="btnEnviar" id="btnEnviar" value="" />
        </form>
	<br />
    <br />
    </div>
    <strong>Recuerde que si usted necesita cotizar alguna asistencia en viaje, puede dirigirse a <a href="http://www.axa-assistance.com.co/index.php?pag=producto&id=7">VIAJE</a>. Alli podr&aacute; encontrar las diferentes tarifas y conocer las opciones que mejor se adaptan a su viaje.</strong>

</div>