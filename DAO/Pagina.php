<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");


class Pagina implements iBaseDatos {

    
	public function __construct(
        $_id,
        $_nombre,
        $_padre,
        $_contenido
    ) {
        $this->id           = $_id;
		$this->nombre    	= $_nombre;
        $this->padre        = $_padre;
		$this->contenido	= $_contenido;
    }

    
	public static function cargar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM pagina WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $padre = null;
            if( $rs[0]["padre"] != null ){
                $padre = Pagina::cargar($rs[0]["padre"]);
            }
            $pagina = new Pagina(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $padre,
				$rs[0]["contenido"]
            );
            return $pagina;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM pagina WHERE id = $_id");
        }
    }

    
	public function actualizar() {
        try {
            $conexion = Conexion::getInstance();
            $consulta="UPDATE pagina SET ".
                "nombre = '$this->nombre', ".
                "padre = $this->padre, ".
				"contenido =  '$this->contenido'".
                "WHERE id = $this->id";
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
	public static function insertar(){
        try {
            $conexion = Conexion::getInstance();
            $consulta =
                "INSERT INTO pagina SET ".
                "nombre = '".func_get_arg(0)."', ".
                "padre = ".((func_get_arg(1) != "")?func_get_arg(1):"NULL").", ".
				"contenido = '".func_get_arg(2)."'";
				
			$conexion->consulta( $consulta );
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
	public static function eliminar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta("DELETE FROM pagina WHERE id = $_id");

        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
	public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $consulta = "SELECT * FROM pagina";
            if( func_num_args() == 1){
                $consulta .= " WHERE padre = ".func_get_arg(0);
            }
            else{
                $consulta .= " WHERE padre IS NULL ";
            }
            $rs = $conexion->consulta( $consulta );
            foreach ($rs as $fila) {
                $padre = null;
                if( $rs[0]["padre"] != null ){
                    $padre = Pagina::cargar($rs[0]["padre"]);
                }
                array_push(
                    $listado,
                    new Pagina(
                        $fila["id"],
                        $fila["nombre"],
                        $padre,
                        $fila["contenido"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }


    public static function PaginaRandom($_padre, $_limit=1)
    {
        try{
            $conexion = Conexion::getInstance();
            $consulta = "SELECT id, nombre, contenido FROM pagina
                        WHERE padre = $_padre
                        order by rand() limit $_limit";
            //echo $consulta;
            $rs = $conexion->consulta( $consulta );
            if ($_limit==1) return $rs[0];
            else return $rs;
        }
        catch(MySQLException $e){
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
                "UPDATE pagina
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }


    public function getPadre() {
        return $this->padre;
    }
	
	
	public function getContenido() {
        return $this->contenido;
    }

    
	public function setContenido( $_contenido) {
       if( strcmp( $this->contenido, $_contenido) != 0 ) {
            $this->contenido = $_contenido;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE pagina
                SET contenido = '".$this->contenido."'
                WHERE id = ".$this->id);
        }
    }

    
	public function getHijos() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM pagina WHERE padre = $this->id");
            foreach ($rs as $fila) {
                $padre = null;
                if( $fila["padre"] != null ){
                    $padre = Pagina::cargar($fila["padre"]);
                }
                array_push(
                    $listado,
                    new Pagina(
                        $fila["id"],
                        $fila["nombre"],
                        $padre,
                        $fila["contenido"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
	public static function getPadreXId( $_id ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT padre FROM pagina WHERE id = $_id");
            return (($rs[0]["padre"] != null)?$rs[0]["padre"]:"");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
	public static function getMigadePan ( $_id, $my=1 ){
        $miga="";
        $padre=Pagina::getPadreXId( $_id );
        if(isset($padre)&& $padre != ""){
            $rdo=Pagina::cargar($padre);
            $miga.=$rdo->getMigadePan($padre,0);
            $miga.="<a href='index.php?pag=pagina&id=$padre'>".$rdo->getNombreEs()."</a> / ";
        }
        if ($my == 1)
        {
            $rdo=Pagina::cargar($_id);
            $miga.="<a href='index.php?pag=pagina&id=$_id'>".$rdo->getNombreEs()."</a> ";
        }
        return $miga;
    }
  
  
    public function getPrimerPadre() {
        try {
            $padre = $this;
            while($padre->getPadre() != null){
                $padre = $padre->getPadre();
            }
            return ($padre->getId());
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    
    protected $id;

    protected $nombre;
 
    private $padre;

	private $contenido;
	
	
}
?>