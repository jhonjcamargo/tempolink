<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Gestiona la informacion general del sitio web
 * @author Carlos Torres
 */
class Configuracion implements iBaseDatos {

    /**
     * Constructor de la clase Texto
     * @param int $_id
     * @param string $_valor
     */
    public function __construct( $_id, $_valor, $_link ) {
        $this->id       = $_id;
        $this->valor    = $_valor;
        $this->link     = $_link;
    }

    /**
     * Carga los datos de un item de configuraci&oacute;n
     * @param int $_id
     * @return Configuracion
     * @throws MySQLException
     */
    public static function cargar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM configuracion WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $configuracion = new Configuracion(
                $rs[0]["id"],
                $rs[0]["valor"],
                $rs[0]["link"]
            );
            return $configuracion;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM configuracion WHERE id = $_id");
        }
    }

    /**
     * Actualiza los campos en la base de datos
     * @throws MySQLException
     */
    public function actualizar() {
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE configuracion SET ".
                "valor = '$this->valor', ".
                "link  = '$this->link' ".
                "WHERE id = $this->id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Inserta un item de configuraci&oacute;n en la bd
     * @param string $_valor
     * @return int id del item de configuraci&oacute;n ingresado
     * @throws MySQLException
     */
    public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta = "INSERT INTO configuracion SET ".
                        "valor = '".func_get_arg(0)."'";
            $consulta.= (func_num_args()>1)?", link = '".func_get_arg(1)."'":"";
            $conexion->consulta($consulta);
            return $conexion->getUltimoId();
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Elimina un item de configuraci&oacute;n de la bd
     * @param int $_id
     * @throws MySQLException
     */
    public static function eliminar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta("DELETE FROM configuracion WHERE id = $_id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Trae el listado de items de configuraci&oacute;n
     * @return array
     * @throws MySQLException
     */
    public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM configuracion");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Configuracion(
                        $fila["id"],
                        $fila["valor"],
                        $fila["link"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Trae el id del item de configuraci&oacute;n
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Trae el valor del item de configuraci&oacute;n
     * @return string
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * Cambia el valor del item de configuraci&oacute;n
     * @param string $_valor
     * @throws MySQLException
     */
    public function setValor( $_valor ) {
        if( strcmp($this->valor, $_valor) != 0 ){
            $this->valor = $_valor;
            try {
                $this->actualizar();
            }
            catch (Exception $e) {
                throw $e;
            }
        }
    }

    /**
     * Trae el valor del link de configuraci&oacute;n
     * @return string
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * Cambia el valor del link de configuraci&oacute;n
     * @param string $_valor
     * @throws MySQLException
     */
    public function setLink( $_link ) {
        if( strcmp($this->link, $_link) != 0 ){
            $this->link = $_link;
            try {
                $this->actualizar();
            }
            catch (Exception $e) {
                throw $e;
            }
        }
    }

    /**
     * Id del item de configuraci&oacute;n
     * @var int
     */
    private $id;

    /**
     * Valor del item de configuraci&oacute;n
     * @var string
     */
    private $valor;

    /**
     * Link de las imagines de la configuracion
     */

     private $link;

    /**
     * Constantes de los items de configuraci&oacute;n
     */
    const FAVICON           = 1;
    const TITULO            = 2;
    const KEYWORDS          = 3;
    const DESCRIPCION       = 4;
    const BANNER            = 5;
}

?>