<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla Redes
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Redes implements iBaseDatos {
	 
	 public function __construct(
        $_id,
		$_nombre,
        $_link,
        $_thumb){
			
        $this->id           = $_id;
        $this->nombre    	= $_nombre;
		$this->link    		= $_link;
        $this->thumb        = $_thumb;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM redes");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Redes(
                        $fila["id"],
                        $fila["nombre"],
                        $fila["link"],
						$fila["thumb"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public static function cargar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM redes WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new Redes(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["link"],
				$rs[0]["thumb"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM redes WHERE id = $_id");
        }
    }
	
	
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO redes SET ".
                "nombre = '".func_get_arg(0)."', ".
                "link = '".func_get_arg(1)."', ".
				"thumb = '".func_get_arg(2)."'";
				
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
            $conexion->consulta("DELETE FROM redes WHERE id = $_id");

        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public function getId() {
        return $this->id;
    }
	
	
	public function getNombre() {
        return $this->nombre;
    }

    
    public function setNombre( $_nombre) {
       if( strcmp( $this->nombre, $_nombre) != 0 ) {
            $this->nombre = $_nombre;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE redes
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getLink() {
        return $this->link;
    }

    
    public function setLink( $_link) {
       if( strcmp( $this->link, $_link) != 0 ) {
            $this->link = $_link;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE redes
                SET link = '".$this->link."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getThumb() {
        return $this->thumb;
    }

    
    public function setThumb( $_thumb) {
       if( strcmp( $this->thumb, $_thumb) != 0 ) {
            $this->thumb = $_thumb;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE redes
                SET thumb  = '".$this->thumb."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
	private $id;

    private $nombre;

    private $link;
	
    private $thumb;
	
	
	
	
}
?>