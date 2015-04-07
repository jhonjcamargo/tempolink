<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla Cargos
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Cargos implements iBaseDatos {
	 
	 public function __construct(
        $_id,
		$_nombre,
        $_categoria){
			
        $this->id           = $_id;
        $this->nombre    	= $_nombre;
		$this->categoria	= $_categoria;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM cargos order by nombre, categoria");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Cargos(
                        $fila["id"],
                        $fila["nombre"],
						$fila["categoria"]
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
            $rs = $conexion->consulta("SELECT * FROM cargos WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new Cargos(
                $rs[0]["id"],
                $rs[0]["nombre"],
				$rs[0]["categoria"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM cargos WHERE id = $_id");
        }
    }
	
	public static function cargarXcategoria( $_id ){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM cargos WHERE categoria = $_id");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Cargos(
                        $fila["id"],
                        $fila["nombre"],
						$fila["categoria"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
		
    }
	
	
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO cargos SET ".
                "nombre = '".func_get_arg(0)."', ".
				"categoria = ".func_get_arg(1)."";
				
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
            $conexion->consulta("DELETE FROM cargos WHERE id = $_id");

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
                "UPDATE cargos
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getCategoria() {
        return $this->categoria;
    }

    
    public function setCategoria( $_categoria) {
       if( strcmp( $this->categoria, $_categoria) != 0 ) {
            $this->categoria = $_categoria;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE cargos
                SET categoria = ".$this->categoria."
                WHERE id = ".$this->id);
        }
    }
	
	
	private $id;

    private $nombre;
	
    private $categoria;
	
	
	
	
}
?>