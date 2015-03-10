<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * Clase encargada del CRUD de la tabla descs
 * @author Carlos Torres
 * @copyright AgathaGroup S.A.
*/
 
class Oferta implements iBaseDatos {
	 
	 public function __construct(
        $_id,
		$_titulo,
        $_desc,
        $_thumb, 
		$_cargo,
		$_destacado){
			
        $this->id           = $_id;
        $this->titulo    	= $_titulo;
		$this->desc    		= $_desc;
        $this->thumb        = $_thumb;
		$this->cargo		= $_cargo;
        $this->destacado    = $_destacado;
    }
	
	
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM ofertas");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Oferta(
                        $fila["id"],
                        $fila["titulo"],
                        $fila["descripcion"],
						$fila["thumb"],
						$fila["categoria"],
						$fila["destacado"]
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
            $rs = $conexion->consulta("SELECT * FROM ofertas WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $desc = new Oferta(
                $rs[0]["id"],
                $rs[0]["titulo"],
                $rs[0]["descripcion"],
				$rs[0]["thumb"],
				$rs[0]["categoria"],
				$rs[0]["destacado"]
            );
            return $desc;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM ofertas WHERE id = $_id");
        }
    }
	
	
	public static function cargarXdestacado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM ofertas where destacado = 1 order by id DESC");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Oferta(
                        $fila["id"],
                        $fila["titulo"],
                        $fila["descripcion"],
						$fila["thumb"],
						$fila["categoria"],
						$fila["destacado"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public static function cargarXcargo($_id){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM ofertas where categoria = $_id");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new Oferta(
                        $fila["id"],
                        $fila["titulo"],
                        $fila["descripcion"],
						$fila["thumb"],
						$fila["categoria"],
						$fila["destacado"]
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
                "INSERT INTO ofertas SET ".
                "titulo = '".func_get_arg(0)."', ".
                "descripcion = '".func_get_arg(1)."', ".
                "thumb = '".func_get_arg(2)."', ".
				"categoria = ".func_get_arg(3).", ".
				"destacado = ".func_get_arg(4)."";
				
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
            $conexion->consulta("DELETE FROM ofertas WHERE id = $_id");

        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	
	public function getId() {
        return $this->id;
    }
	
	
	public function getTitulo() {
        return $this->titulo;
    }

    
    public function setTitulo( $_titulo) {
       if( strcmp( $this->titulo, $_titulo) != 0 ) {
            $this->titulo = $_titulo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE ofertas
                SET titulo = '".$this->titulo."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getDesc() {
        return $this->desc;
    }

    
    public function setDesc( $_desc) {
       if( strcmp( $this->desc, $_desc) != 0 ) {
            $this->desc = $_desc;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE ofertas
                SET descripcion = '".$this->desc."'
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
                "UPDATE ofertas
                SET thumb  = '".$this->thumb."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getCargo() {
        return $this->cargo;
    }

    
    public function setCargo( $_cargo) {
       if( strcmp( $this->cargo, $_cargo) != 0 ) {
            $this->cargo = $_cargo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE ofertas
                SET categoria  = '".$this->cargo."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getDestacado() {
        return $this->destacado;
    }

    
    public function setDestacado( $_destacado) {
       if( strcmp( $this->destacado, $_destacado) != 0 ) {
            $this->destacado = $_destacado;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE ofertas
                SET destacado  = '".$this->destacado."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
	private $id;

    private $titulo;

    private $desc;
	
    private $thumb;

    private $cargo;
	
	private $destacado;
	
}
?>