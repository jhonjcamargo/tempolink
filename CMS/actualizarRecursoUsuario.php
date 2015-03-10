<?php

if( isset($_FILES["recurso"]) ) {
    if( $_FILES["recurso"]["name"] != "" ) {
		$carpeta = is_dir("../admin/recursos/".$_POST["id"]);

		if($carpeta == true){
			move_uploaded_file( $_FILES["recurso"]["tmp_name"], "../admin/recursos/".$_POST["id"]."/".$_FILES["recurso"]["name"] );
		}
		else{
			mkdir("../admin/recursos/".$_POST["id"],0777);
			move_uploaded_file( $_FILES["recurso"]["tmp_name"], "../admin/recursos/".$_POST["id"]."/".$_FILES["recurso"]["name"] );
		}
		
    }
}

?>
<script type="text/javascript">
    parent.mostrarMensaje("Recurso asignado", "El recurso fue asignados con &eacute;xito", 'index.php?pag=recursos&opc=recursosUsuario');
</script>