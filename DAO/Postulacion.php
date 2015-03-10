<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla Cargos
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Postulacion {
	 
	 public function __construct(
        $_id,
		$_usuario,
        $_oferta){
			
        $this->id           = $_id;
        $this->usuario    	= $_usuario;
		$this->oferta		= $_oferta;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM postulaciones order by id ASC");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Postulacion(
                        $fila["id"],
                        $fila["IDUsuario"],
						$fila["IDOferta"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public static function cargarXusuario( $_id ){
        try {
			$listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM postulaciones WHERE IDUsuario = $_id");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Postulacion(
                        $fila["id"],
                        $fila["idUsuario"],
						$fila["idOferta"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public static function cargar( $_idU, $_idO ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM postulaciones WHERE IDUsuario = $_idU and IDOferta = $_idO");
            if( count( $rs ) == 0 ){
               $result = false; 
            }
            else{
				$result = true;   
			}
            return $result;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM postulaciones WHERE IDUsuario = $_id");
        }
    }
	
	
	
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO postulaciones SET ".
                "IDUsuario = ".func_get_arg(0).", ".
				"IDOferta = ".func_get_arg(1)."";
				
			$conexion->consulta( $consulta );
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public function actualizar() {
    }
	
	
	public static function eliminar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta("DELETE FROM postulaciones WHERE id = $_id");

        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public function getId() {
        return $this->id;
    }
	
	
	public function getUsuario() {
        return $this->usuario;
    }
	
	public function getOferta() {
        return $this->oferta;
    }
	
	
	private $id;

    private $usuario;
	
    private $oferta;
	
	
	
	
}
?>