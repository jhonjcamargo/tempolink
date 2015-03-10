<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla Clientes
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Cliente implements iBaseDatos {
	 
	 public function __construct(
        $_id,
		$_orden,
        $_cliente,
        $_thumb){
			
        $this->id           = $_id;
        $this->orden    	= $_orden;
		$this->cliente    	= $_cliente;
        $this->thumb        = $_thumb;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM cliente");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Cliente(
                        $fila["id"],
                        $fila["orden"],
                        $fila["cliente"],
						$fila["thumb_img"]
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
            $rs = $conexion->consulta("SELECT * FROM cliente WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $cliente = new Cliente(
                $rs[0]["id"],
                $rs[0]["orden"],
                $rs[0]["cliente"],
				$rs[0]["thumb_img"]
            );
            return $cliente;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM cliente WHERE id = $_id");
        }
    }
	
	
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO cliente SET ".
                "orden = ".func_get_arg(0).", ".
                "cliente = '".func_get_arg(1)."', ".
				"thumb_img = '".func_get_arg(2)."'";
				
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
            $conexion->consulta("DELETE FROM cliente WHERE id = $_id");

        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public function getId() {
        return $this->id;
    }
	
	
	public function getOrden() {
        return $this->orden;
    }

    
    public function setOrden( $_orden) {
       if( strcmp( $this->orden, $_orden) != 0 ) {
            $this->orden = $_orden;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE cliente
                SET orden = '".$this->orden."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getCliente() {
        return $this->cliente;
    }

    
    public function setCliente( $_cliente) {
       if( strcmp( $this->cliente, $_cliente) != 0 ) {
            $this->cliente = $_cliente;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE cliente
                SET cliente = '".$this->cliente."'
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
                "UPDATE cliente
                SET thumb_img  = '".$this->thumb."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
	private $id;

    private $orden;

    private $cliente;
	
    private $thumb;
	
	
	
	
}
?>