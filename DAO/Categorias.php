
<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla Categorias
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Categorias implements iBaseDatos {
	 
	 public function __construct(
        $_id,
		$_nombre){
			
        $this->id           = $_id;
        $this->nombre    	= $_nombre;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM categoriascargo");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Categorias(
                        $fila["id"],
                        $fila["nombre"]
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
            $rs = $conexion->consulta("SELECT * FROM categoriascargo WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new Categorias(
                $rs[0]["id"],
                $rs[0]["nombre"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM categoriascargo WHERE id = $_id");
        }
    }
	
	
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO categoriascargo SET ".
				"nombre = '".func_get_arg(0)."'";
				
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
            $conexion->consulta("DELETE FROM categoriascargo WHERE id = $_id");

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
                "UPDATE categoriascargo
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
	private $id;

    private $nombre;
}
?>