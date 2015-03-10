<?php
require_once("MySQLException.php");

/**
 * Clase encargada de gestionar la conexi&oacute;n a la base de datos
 * @author Silicca Ltda
 * @version 1.0
 */
class Conexion {

    /**
     * Constructor de la clase Conexion,
     * utiliza Singleton para obligar la singularidad de la conexi&oacute;n
     * @throws MySQLException
     */
    private function __construct() {
        $this->host     = "localhost";
        $this->database = "tempolin_k";
        $this->user     = "root";
        $this->password = "";
        try {
            $this->link = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->database,
                3306 );
            if( mysqli_connect_errno() ) {
                throw new Exception();
            }
        }
        catch( Exception $e ) {
            throw new MySQLException( mysqli_connect_error(), mysqli_connect_errno(), $e->getFile(), $e->getLine(), "Error al conectar a MySQL" );
        }
    }

    /**
     * Trae la instancia de conexi&oacute;n actual, si no existe la crea
     * @return Conexion
     * @throws MySQLException
     */
    public static function getInstance() {
        if (self::$instance == null) {
            try {
                self::$instance = new Conexion();
            }
            catch( MySQLException $e ) {
                throw $e;
            }
        }
        return self::$instance;
    }

    /**
     * Ejecuta una consulta a la base de datos
     * @param string $_con consulta que se desea ejecutar en la base de datos
     * @return array|boolean arreglo si consulta es SELECT o boolean si consulta es INSERT o UPDATE
     * @throws MySQLException
     */
    public function consulta( $_consulta ) {
        try {
            $rs = $this->link->query( $_consulta );
            if( $this->link->errno ){
                throw new Exception();
            }
            if ($rs === true) {
                return true;
            }
            $rows = array();
            $numRows = $rs->num_rows;
            for($i = 0; $i < $numRows; $i ++) {
                array_push( $rows, $rs->fetch_assoc() );
            }
            return $rows;
        }
        catch (Exception $e ){
            throw new MySQLException( $this->link->error, $this->link->errno, $e->getFile(), $e->getLine(), $_consulta );
        }
    }

    /**
     * Trae el &uacute;ltimo ID generado en una consulta INSERT
     * @return int
     */
    public function getUltimoId() {
        return $this->link->insert_id;
    }

    /**
     * Enlace de conexi&oacute;n a la base de datos
     * @var mysqli
     */
    private $link;

    /**
     * Dirección del servidor de base de datos
     * @var string
     */
    private $host;

    /**
     * Base de datos a la que se quiere conectar
     * @var string
     */
    private $database;

    /**
     * Usuario con el que se desea conectar a la base de datos
     * @var string
     */
    private $user;

    /**
     * Contrase&ntilde;a con la que se desea conectar a la base de datos
     * @var string
     */
    private $password;

    /**
     * Instancia singular de la clase Conexion con la que siempre se trabajar&aacute;
     * @var Conexion
     */
    private static $instance;
}
?>