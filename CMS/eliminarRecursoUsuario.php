<?php

unlink("../admin/recursos/".$_GET["usuario"]."/".$_GET["id"]);

?>
<script type="text/javascript">
    parent.mostrarMensaje("Recurso eliminado", "El recurso fue eliminado con &eacute;xito", 'index.php?pag=usuarios&opc=recursosUsuario');
</script>