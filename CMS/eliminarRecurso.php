<?php

unlink("../recursos/".$_GET["id"]);

?>
<script type="text/javascript">
    parent.mostrarMensaje("Recurso eliminado", "El recurso fue eliminado con &eacute;xito", 'index.php?pag=recursos&opc=listadoRecursos');
</script>