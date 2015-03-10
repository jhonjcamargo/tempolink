<?php

if( isset($_FILES["recurso"]) ) {
    if( $_FILES["recurso"]["name"] != "" ) {
        move_uploaded_file( $_FILES["recurso"]["tmp_name"], "../recursos/".$_FILES["recurso"]["name"] );
    }
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Recurso insertado", "El recurso fue insertado con &eacute;xito", 'index.php?pag=recursos&opc=listadoRecursos');
</script>