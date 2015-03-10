<?php

/**
 * Excepci&oacute;n personalizada para los errores de MySQL
 * @author Silicca Ltda
 * @copyright Silicca Ltda.
 * @version 1.0
 */

class MySQLException extends Exception {

    /**
     * Constructor
     * @param string $_mensaje mensaje del error
     * @param int $_codigo c&oacute;digo del error
     * @param string $_archivo archivo en donde ocurri&oacute; el error
     * @param int $_linea l&iacute;nea en donde ocurri&oacute; el error
     * @param string $_consulta consulta hecha al motor de MySQL
     */
    function __construct( $_mensaje, $_codigo, $_archivo, $_linea, $_consulta ) {
        parent::__construct($_mensaje, $_codigo);
        $this->file = $_archivo;
        $this->line = $_linea;
        $this->consulta = $_consulta;
    }

    /**
     * Trae la consulta hecha al motor de MySQL
     * @return string
     */
    public function getConsulta() {
        return $this->consulta;
    }

    /**
     * consulta hecha al motor MySQL
     * @var string
     */
    private $consulta;

}
?>
