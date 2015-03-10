<h3>INGRESAR RECURSO</h3>
<form name="formEditarRecurso" method="post" action="actualizarRecurso.php" target="iframeOculto" enctype="multipart/form-data">
    <table width="100%" border="0">
        <tr>
            <td width="25%" valign="bottom">Archivo</td>
            <td width="75%"><input type="file" name="recurso" class="file_" size="50"></td>
        </tr>
    </table>
    <table width="100%">
        <tr align="center">
            <td width="50%"><a class="read_main" href="javascript:document.formEditarRecurso.submit()">Insertar</a></td>
            <td width="50%"><a class="read_main" href="javascript:document.location.href='index.php?pag=recursos&opc=listadoRecursos'">Cancelar</a></td>
        </tr>
    </table>
</form>