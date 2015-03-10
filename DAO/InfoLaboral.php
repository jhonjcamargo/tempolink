<?php 
require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * infoLaboral en la web de TempoLink
 */
 
class InfoLaboral {
	public function __construct(
        $_id,
        $_idUsuario,
        $_empresa,
        $_cargo,
        $_fcIngreso,
        $_fcSalida,
        $_descCargo
        ) {
        $this->id    		= $_id;
        $this->idUsuario    = $_idUsuario;
        $this->empresa      = $_empresa;
        $this->cargo        = $_cargo;
        $this->fcIngreso	= $_fcIngreso;
        $this->fcSalida		= $_fcSalida;
      	$this->descCargo    = $_descCargo;
    }
	
	
	public static function listado() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM infoLaboral");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new InfoLaboral(
                        $fila["id"],
                        $fila["idUsuario"],
                        $fila["empresa"],
                        $fila["cargo"],
                        $fila["fcIngreso"],
                        $fila["fcSalida"],
                        $fila["descCargo"]
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
            $consulta="INSERT INTO infoLaboral SET ".
                "idUsuario    = ".func_get_arg(0).", ".
                "empresa      = '".func_get_arg(1)."', ".
                "cargo        = '".func_get_arg(2)."', ".
                "fcIngreso    = '".func_get_arg(3)."', ".
                "fcSalida     = '".func_get_arg(4)."', ".
                "descCargo    = '".func_get_arg(5)."'";         
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
            $conexion->consulta("DELETE FROM infoLaboral WHERE id = $_id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	 
	 public static function cargarXusuario($_id) {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM infoLaboral where idUsuario = $_id");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new InfoLaboral(
                        $fila["id"],
                        $fila["idUsuario"],
                        $fila["empresa"],
                        $fila["cargo"],
                        $fila["fcIngreso"],
                        $fila["fcSalida"],
                        $fila["descCargo"]
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
            $rs = $conexion->consulta("SELECT * FROM infoLaboral WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new InfoLaboral(
                $rs[0]["id"],
                $rs[0]["idusuario"],
                $rs[0]["empresa"],
                $rs[0]["cargo"],
                $rs[0]["fcIngreso"],
                $rs[0]["fcSalida"],
                $rs[0]["descCargo"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM infoLaboral WHERE id = $_id");
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
                "UPDATE infoLaboral
                SET idUsuario = ".$this->idUsuario."
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getEmpresa() {
        return $this->empresa;
    }
	
	
    public function setEmpresa( $_empresa) {
       if( strcmp( $this->empresa, $_empresa) != 0 ) {
            $this->empresa = $_empresa;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoLaboral
                SET empresa = '".$this->empresa."'
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
                "UPDATE infoLaboral
                SET cargo = '".$this->cargo."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getIngreso() {
        return $this->fcIngreso;
    }
	
	
    public function setIngreso( $_fcIngreso) {
       if( strcmp( $this->fcIngreso, $_fcIngreso) != 0 ) {
            $this->fcIngreso = $_fcIngreso;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoLaboral
                SET fcIngreso = '".$this->fcIngreso."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getSalida() {
        return $this->fcSalida;
    }
	
	
    public function setSalida( $_fcSalida) {
       if( strcmp( $this->fcSalida, $_fcSalida) != 0 ) {
            $this->fcSalida = $_fcSalida;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoLaboral
                SET fcSalida = '".$this->fcSalida."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getDesc() {
        return $this->descCargo;
    }
	
	
    public function setDesc( $_descCargo) {
       if( strcmp( $this->descCargo, $_descCargo) != 0 ) {
            $this->descCargo = $_descCargo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE infoLaboral
                SET descCargo = '".$this->descCargo."'
                WHERE id = ".$this->id);
        }
    }
	
	
 	private $id;

    private $idUsuario;

    private $empresa;

    private $cargo;

    private $fcIngreso;

    private $fcSalida;
	
	private $descCargo;

}
?>