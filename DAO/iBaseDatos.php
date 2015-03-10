<?php

/**
 * Interface para administrar los datos en la BD
 * @author Silicca Ltda
 * @copyright Silicca Ltda.
 * @version 1.0
 */
interface iBaseDatos {

    public static function cargar( $_id );

    public function actualizar();

    public static function insertar();

    public static function eliminar( $_id );

    public static function listado();
}
?>
