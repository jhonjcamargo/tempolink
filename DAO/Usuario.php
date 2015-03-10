<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Usuario con acceso al m&oacute;dulo de administraci&oacute;n
 * @author Silicca Ltda
 * @version 1.0
 * @copyright Silicca Ltda.
 */
class Usuario implements iBaseDatos {

    /**
     * Constructor de la clase Usuario
     * @param int $_id
     * @param string $_nombre
     * @param string $_login
     * @param string $_contrasena
     */
    public function __construct( $_id, $_nombre, $_login, $_contrasena ) {
        $this->id           = $_id;
        $this->nombre       = $_nombre;
        $this->login        = $_login;
        $this->contrasena   = $_contrasena;
    }

    /**
     * Carga un usuario desde la bd
     * @param int $_id id del usuario a cargar
     * @return Usuario usuario cargado
     * @throws MySQLException
     */
    public static function cargar( $_id ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuario WHERE id = ".$_id);
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $usuario = new Usuario(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["login"],
                $rs[0]["contrasena"] );
            return $usuario;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuario WHERE id = $_id");
        }
    }

    /**
     * Carga un usuario desde la bd dado su login
     * @param string $_login login del usuario a cargar
     * @return Usuario usuario cargado
     * @throws MySQLException
     */
    public static function cargarXLogin( $_login ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuario WHERE login = '".$_login."'");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $usuario = new Usuario(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["login"],
                $rs[0]["contrasena"] );
            return $usuario;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuario WHERE id = $_login");
        }
    }

    /**
     * Elimina un usuario de la bd
     * @param int $_id id del registro a eliminar
     * @throws MySQLException
     */
    public static function eliminar( $_id ) {
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta("DELETE FROM usuario WHERE id = $_id");
        }
        catch (MySQLException $e ){
            throw $e;
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
                "UPDATE usuario SET ".
                "nombre = '$this->nombre', ".
                "login = '$this->login', ".
                "contrasena = '$this->contrasena' ".
                "WHERE id = $this->id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Lista los usuarios
     * @return array
     * @throws MySQLException
     */
    public static function listado() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuario");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Usuario(
                        $fila["id"],
                        $fila["nombre"],
                        $fila["login"],
                        $fila["contrasena"]
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
     * Inserta un nuevo usuario en la base de datos
     * @param string $_nombre
     * @param string $_login
     * @param string $_contrasena
     * @return int id del usuario ingresado
     */
    public static function insertar() {
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "INSERT INTO usuario SET ".
                "nombre = '".func_get_arg(0)."', ".
                "login = '".func_get_arg(1)."', ".
                "contrasena = '".func_get_arg(2)."'" );
            return $conexion->getUltimoId();
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Trae el id del usuario
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Trae el nombre del usuario
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Cambia el nombre del usuario
     * @param string $_nombre
     */
    public function setNombre( $_nombre ) {
        if( strcmp($this->nombre, $_nombre) != 0 ){
            $this->nombre = $_nombre;
            try {
                $this->actualizar();
            }
            catch (MySQLException $e) {
                throw $e;
            }
        }
    }

    /**
     * Trae el login del usuario
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * Cambia el login del usuario
     * @param string $_login
     */
    public function setLogin( $_login ) {
        if( strcmp($this->login, $_login) != 0 ){
            $this->login = $_login;
            try {
                $this->actualizar();
            }
            catch (MySQLException $e) {
                throw $e;
            }
        }
    }

    /**
     * Trae la contrase&ntilde;a del usuario
     * @return string
     */
    public function getContrasena() {
        return $this->contrasena;
    }

    /**
     * Cambia la contrase&ntilde;a del usuario
     * @param string $_contrasena
     */
    public function setContrasena( $_contrasena ) {
        if( strcmp( $this->contrasena, $_contrasena ) != 0 ){
            $this->contrasena = $_contrasena;
            try {
                $this->actualizar();
            }
            catch (MySQLException $e) {
                throw $e;
            }
        }
    }

    /**
     * Id de la noticia
     * @var int
     */
    private $id;

    /**
     * Nombre del usuario
     * @var string
     */
    private $nombre;

    /**
     * Login de acceso del usuario
     * @var string
     */
    private $login;

    /**
     * Contrase&ntilde;a de acceso del usuario
     * @var string
     */
    private $contrasena;
}
?>
