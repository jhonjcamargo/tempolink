<?php 
require_once("Conexion.php");
require_once("iBaseDatos.php");

/**
 * UsuarioRegistrado en la web de TempoLink
 */
 
class UsuarioRegistrado implements iBaseDatos {
	public function __construct(
        $_id,
        $_nombre,
        $_apellido,
        $_tipoDoc,
        $_numeroDoc,
        $_fcNac,
        $_genero,
        $_ciudad,
        $_direccion,
        $_tfno,
        $_perfil,
        $_email,
        $_usuario,
        $_pass,
        $_activo
    ) {
        $this->id           = $_id;
        $this->nombre       = $_nombre;
        $this->apellido     = $_apellido;
        $this->tipoDoc      = $_tipoDoc;
        $this->numeroDoc	= $_numeroDoc;
        $this->fcNac        = $_fcNac;
        $this->genero       = $_genero;
        $this->ciudad       = $_ciudad;
        $this->direccion    = $_direccion;
        $this->tfno         = $_tfno;
        $this->perfil       = $_perfil;
        $this->email        = $_email;
        $this->usuario	    = $_usuario;
        $this->pass			= $_pass;
      	$this->activo       = $_activo;
    }
	
	
	public static function listado() {
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioregistrado");
            foreach ($rs as $fila) {
                array_push(
                    $listado,
                    new UsuarioRegistrado(
                        $fila["id"],
                        $fila["nombre"],
                        $fila["apellido"],
                        $fila["tipoDoc"],
                        $fila["numeroDoc"],
                        $fila["fcNac"],
                        $fila["genero"],
                        $fila["ciudad"],
                        $fila["direccion"],
                        $fila["tfno"],
                        $fila["perfil"],
                        $fila["email"],
                        $fila["usuario"],
                        $fila["pass"],
                        $fila["activo"]
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
            $consulta="INSERT INTO usuarioregistrado SET ".
                "nombre         = '".func_get_arg(0)."', ".
                "apellido       = '".func_get_arg(1)."', ".
                "tipoDoc        = '".func_get_arg(2)."', ".
                "numeroDoc      = ".func_get_arg(3).", ".
                "fcNac          = '".func_get_arg(4)."', ".
                "genero         = '".func_get_arg(5)."', ".
                "ciudad         = '".func_get_arg(6)."', ".
                "direccion      = '".func_get_arg(7)."', ".
                "tfno           = '".func_get_arg(8)."', ".
                "perfil         = '".func_get_arg(9)."', ".
                "email          = '".func_get_arg(10)."', ".
                "usuario        = '".func_get_arg(11)."', ".
                "pass           = '".func_get_arg(12)."', ".
                "activo         = 'P'";         
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
            $conexion->consulta("DELETE FROM usuarioregistrado WHERE id = $_id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }
	 
	 public function actualizar() {}
	 
	 public static function cargar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioregistrado WHERE id = $_id");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $link = new UsuarioRegistrado(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["apellido"],
                $rs[0]["tipoDoc"],
                $rs[0]["numeroDoc"],
                $rs[0]["fcNac"],
                $rs[0]["genero"],
                $rs[0]["ciudad"],
                $rs[0]["direccion"],
                $rs[0]["tfno"],
                $rs[0]["perfil"],
                $rs[0]["email"],
				$rs[0]["usuario"],
				$rs[0]["pass"],
				$rs[0]["activo"]
            );
            return $link;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuarioregistrado WHERE id = $_id");
        }
    }
	
	public static function cargarXLogin( $_user ) {
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM usuarioregistrado WHERE usuario = '".$_user."'");
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $usuario = new UsuarioRegistrado(
                $rs[0]["id"],
                $rs[0]["nombre"],
                $rs[0]["apellido"],
                $rs[0]["tipoDoc"],
                $rs[0]["numeroDoc"],
                $rs[0]["fcNac"],
                $rs[0]["genero"],
                $rs[0]["ciudad"],
                $rs[0]["direccion"],
                $rs[0]["tfno"],
                $rs[0]["perfil"],
                $rs[0]["email"],
				$rs[0]["usuario"],
				$rs[0]["pass"],
				$rs[0]["activo"]
            );
            return $usuario;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM usuarioregistrado WHERE id = $_login");
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
                "UPDATE usuarioregistrado
                SET nombre = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getApellido() {
        return $this->apellido;
    }
	
	
    public function setApellido( $_apellido) {
       if( strcmp( $this->apellido, $_apellido) != 0 ) {
            $this->apellido = $_apellido;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET apellido = '".$this->apellido."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getTipoDoc() {
        return $this->tipoDoc;
    }
	
	
    public function setTipoDoc( $_tipoDoc) {
       if( strcmp( $this->tipoDoc, $_tipoDoc) != 0 ) {
            $this->tipoDoc = $_tipoDoc;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET tipoDoc = '".$this->tipoDoc."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getDocumento() {
        return $this->numeroDoc;
    }
	
	
    public function setDocumento( $_numeroDoc) {
       if( strcmp( $this->numeroDoc, $_numeroDoc) != 0 ) {
            $this->numeroDoc = $_numeroDoc;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET numeroDoc = '".$this->numeroDoc."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getNacimiento() {
        return $this->fcNac;
    }
	
	
    public function setNacimiento( $_fcNac) {
       if( strcmp( $this->fcNac, $_fcNac) != 0 ) {
            $this->fcNac = $_fcNac;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET fcNac = '".$this->fcNac."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getGenero() {
        return $this->genero;
    }
	
	
    public function setGenero( $_genero) {
       if( strcmp( $this->genero, $_genero) != 0 ) {
            $this->genero = $_genero;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET genero = '".$this->genero."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getCiudad() {
        return $this->ciudad;
    }
	
	
    public function setCiudad( $_ciudad) {
       if( strcmp( $this->ciudad, $_ciudad) != 0 ) {
            $this->ciudad = $_ciudad;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET ciudad = '".$this->ciudad."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getDireccion() {
        return $this->direccion;
    }
	
	
    public function setDireccion( $_direccion) {
       if( strcmp( $this->direccion, $_direccion) != 0 ) {
            $this->direccion = $_direccion;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET direccion = '".$this->direccion."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getTelefono() {
        return $this->tfno;
    }
	
	
    public function setTelefono( $_tfno) {
       if( strcmp( $this->tfno, $_tfno) != 0 ) {
            $this->tfno = $_tfno;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET tfno = '".$this->tfno."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getPerfil() {
        return $this->perfil;
    }
	
	
    public function setPerfil( $_perfil) {
       if( strcmp( $this->perfil, $_perfil) != 0 ) {
            $this->perfil = $_perfil;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET perfil = '".$this->perfil."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getEmail() {
        return $this->email;
    }
	
	
    public function setEmail( $_email) {
       if( strcmp( $this->email, $_email) != 0 ) {
            $this->email = $_email;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET email = '".$this->email."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getUsuario() {
        return $this->usuario;
    }
	
	
    public function setUsuario( $_usuario) {
       if( strcmp( $this->usuario, $_usuario) != 0 ) {
            $this->usuario = $_usuario;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET usuario = '".$this->usuario."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getPass() {
        return $this->pass;
    }
	
	
    public function setPass( $_pass) {
       if( strcmp( $this->pass, $_pass) != 0 ) {
            $this->pass = $_pass;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET pass = '".$this->pass."'
                WHERE id = ".$this->id);
        }
    }
	
	
	public function getActivo() {
        return $this->activo;
    }
	
	
    public function setActivo( $_activo) {
       if( strcmp( $this->activo, $_activo) != 0 ) {
            $this->activo = $_activo;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE usuarioregistrado
                SET activo = '".$this->activo."'
                WHERE id = ".$this->id);
        }
    }
	
	
	
 	private $id;

    private $nombre;

    private $apellido;

    private $tipoDoc;

    private $numeroDoc;

    private $fcNac;

    private $genero;

    private $ciudad;
	
	private $direccion;
	
    private $tfno;
	
    private $perfil;
	
	private $email;

    private $usuario;

    private $pass;

    private $activo;



}
?>