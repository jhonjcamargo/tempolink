<?php 
require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * infoAcademica en la web de TempoLink
 */
 
class InfoAcademica {
	public function __construct(
        $_id,
        $_idUsuario,
        $_estudios,
        $_titulo,
        $_institucion
		) {
        $this->id    		= $_id;
        $this->idUsuario    = $_idUsuario;
        $this->estudios     = $_estudios;
        $this->titulo       = $_titulo;
        $this->institucion	= $_institucion;
    }
	
	
	public static function listado() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM infoAcademica");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new InfoAcademica(
                        $fila["id"],
                        $fila["idUsuario"],
                        $fila["estudios"],
                        $fila["titulo"],
                        $fila["institucion"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	 public static function insertar() {
        try {
            $conexion = Conexion::getInstance();
            $consulta="INSERT INTO infoAcademica SET ".
                "idUsuario    = ".func_get_arg(0).", ".
                "estudios      = '".func_get_arg(1)."', ".
                "titulo        = '".func_get_arg(2)."', ".
                "institucion    = '".func_get_arg(3)."'";         
            $conexion->consulta($consulta);
            return $conexion->getUltimoId();
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	
	public static function eliminar( $_id ) {
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta("DELETE FROM infoAcademica WHERE id = $_id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	 
	 public static function cargarXusuario($_id) {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM infoAcademica where idUsuario = $_id");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new InfoAcademica(
                        $fila["id"],
                        $fila["idUsuario"],
                        $fila["estudios"],
                        $fila["titulo"],
                        $fila["institucion"]
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
            $rs = $conexion->consulta("SELECT * FROM infoAcademica WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new InfoAcademica(
                $rs[0]["id"],
                $rs[0]["idusuario"],
                $rs[0]["estudios"],
                $rs[0]["titulo"],
                $rs[0]["institucion"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM infoAcademica WHERE id = $_id");
        }
    }
	
    
	public function getId() {
        return $this->id;
    }
	
	
	public function getUsuario() {
        return $this->idUsuario;
    }
	
	
    public function setUsuario( $_idUsuario) {
       if( strcmp( $this->idUsuario, $_idUsuario) != 0 ) {
            $this->idUsuario = $_idUsuario;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoAcademica
                SET idUsuario = ".$this->idUsuario."
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getEstudio() {
        return $this->estudios;
    }
	
	
    public function setEstudio( $_estudios) {
       if( strcmp( $this->estudios, $_estudios) != 0 ) {
            $this->estudios = $_estudios;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoAcademica
                SET estudios = '".$this->estudios."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getTitulo() {
        return $this->titulo;
    }
	
	
    public function setTitulo( $_titulo) {
       if( strcmp( $this->titulo, $_titulo) != 0 ) {
            $this->titulo = $_titulo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoAcademica
                SET titulo = '".$this->titulo."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getInstitucion() {
        return $this->institucion;
    }
	
	
    public function setInstitucion( $_institucion) {
       if( strcmp( $this->institucion, $_institucion) != 0 ) {
            $this->institucion = $_institucion;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoAcademica
                SET institucion = '".$this->institucion."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
	
	
 	private $id;

    private $idUsuario;

    private $estudios;

    private $titulo;

    private $institucion;

}
?>