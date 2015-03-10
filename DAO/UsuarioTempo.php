<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * UsuarioTempo con acceso al m&oacute;dulo de administraci&oacute;n
 * @author Silicca Ltda
 * @version 1.0
 * @copyright Silicca Ltda.
 */
class UsuarioTempo implements iBaseDatos {

    /**
     * Constructor de la clase UsuarioTempo
     * @param int $_id
     * @param string $_nombre
     * @param string $_login
     * @param string $_contrasena
     */
    public function __construct( $_id, $_nombre, $_tipo, $_login, $_contrasena ) {
        $this->id           = $_id;
        $this->nombre       = $_nombre;
		$this->tipo			= $_tipo;
        $this->login        = $_login;
        $this->contrasena   = $_contrasena;
    }

    /**
     * Carga un usuario desde la bd
     * @param int $_id id del usuario a cargar
     * @return UsuarioTempo usuario cargado
     * @throws MySQLException
     */
    public static function cargar( $_id ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioTempo WHERE id = ".$_id);
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $usuario = new UsuarioTempo(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["tipo"],
                $rs[0]["login"],
                $rs[0]["contrasena"] );
            return $usuario;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuarioTempo WHERE id = $_id");
        }
    }

    /**
     * Carga un usuario desde la bd dado su login
     * @param string $_login login del usuario a cargar
     * @return UsuarioTempo usuario cargado
     * @throws MySQLException
     */
    public static function cargarXLogin( $_login, $_tipo ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioTempo WHERE login = '".$_login."' and tipo = '".$_tipo."'");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $usuario = new UsuarioTempo(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["tipo"],
                $rs[0]["login"],
                $rs[0]["contrasena"] );
            return $usuario;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuarioTempo WHERE id = $_login");
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
            $conexion->consulta("DELETE FROM usuarioTempo WHERE id = $_id");
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
            $rs = $conexion->consulta("SELECT * FROM usuarioTempo order by tipo asc");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new UsuarioTempo(
                        $fila["id"],
                        $fila["nombre"],
                        $fila["tipo"],
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
	
	
	public static function listadoXEmpleado() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioTempo where tipo = '0' order by tipo asc");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new UsuarioTempo(
                        $fila["id"],
                        $fila["nombre"],
                        $fila["tipo"],
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
                "INSERT INTO usuarioTempo SET ".
                "nombre = '".func_get_arg(0)."', ".
                "tipo = '".func_get_arg(1)."', ".
                "login = '".func_get_arg(2)."', ".
                "contrasena = '".func_get_arg(3)."'" );
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
			$conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioTempo
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
            
        }
    }
	
	
	public function getTipo() {
        return $this->tipo;
    }

    /**
     * Cambia el nombre del usuario
     * @param string $_nombre
     */
    public function setTipo( $_tipo ) {
        if( strcmp($this->tipo, $_tipo) != 0 ){
            $this->tipo = $_tipo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioTempo
                SET tipo = '".$this->tipo."'
                WHERE id = ".$this->id);
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
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioTempo
                SET login = '".$this->login."'
                WHERE id = ".$this->id);
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
            $conexion = Conexion::getInstance();
            $conexion->consulta(
			"UPDATE usuarioTempo
			SET contrasena = '".$this->contrasena."'
			WHERE id = ".$this->id);
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



    private $tipo;

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
