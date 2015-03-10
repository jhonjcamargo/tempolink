<?php

require_once("Conexion.php");
require_once("iBaseDatos.php");
require_once("Pagina.php");

/**
 * Clase encargada de gestionar las p&aacute;ginas de tipo contenido del portal
 * @author Silicca Ltda
 * @version 1.0
 * @copyright Silicca Ltda
 */
class Contenido extends Pagina implements iBaseDatos {

    /**
     * Constructor de la clase Contenido
     * @param int $_id
     * @param string $_nombre_es
     * @param string $_nombre_en
     * @param Pagina $_padre
     * @param boolean $_privada
     * @param string $_texto_es
     * @param string $_texto_en
     */
    public function __construct(
        $_id,
        $_nombre_es,
        $_nombre_en,
        $_padre,
        $_privada,
		$_imagen,
        $_texto_es,
        $_texto_en
    ) {
        parent::__construct(
            $_id,
            $_nombre_es,
            $_nombre_en,
            TipoPagina::cargar( TipoPagina::CONTENIDO ),
            $_padre,
            $_privada,
			$_imagen);
        $this->texto_es = $_texto_es;
        $this->texto_en = $_texto_en;
    }

    /**
     * Carga los datos de una p&aacute;gina de tipo contenido
     * @param int $_id
     * @return Contenido
     * @throws MySQLException
     */
    public static function cargar( $_id ){
        try {
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta(
                "SELECT p.id, p.nombre_es, p.nombre_en, p.padre, p.privada, p.imagen, c.texto_es, c.texto_en ".
                "FROM contenido c INNER JOIN pagina p ".
                "ON c.id = p.id ".
                "WHERE c.id = $_id"
            );
            if( count( $rs ) == 0 ){
                throw new Exception();
            }
            $padre = null;
            if( $rs[0]["padre"] != null ){
                $padre = Pagina::cargar($rs[0]["padre"]);
            }
            $contenido = new Contenido(
                $rs[0]["id"],
                $rs[0]["nombre_es"],
                $rs[0]["nombre_en"],
                $padre,
                (($rs[0]["privada"] == 1)?true:false),
				$rs[0]["imagen"],
                $rs[0]["texto_es"],
                $rs[0]["texto_en"]
            );
            return $contenido;
        }
        catch (MySQLException $e ){
            throw $e;
        }
        catch (Exception $e ){
            throw new MySQLException( "Registro no existe", 0, $e->getFile(), $e->getLine(), "SELECT * FROM contenido WHERE id = $_id");
        }
    }

    /**
     * Actualiza los campos en la base de datos
     * @throws MySQLException
     */
    public function actualizar() {
        try {
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE contenido SET ".
                "texto_es = '$this->texto_es', ".
                "texto_en = '$this->texto_en' ".
                "WHERE id = $this->id");
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * La inserci&oacute;n de un contenido se hace por la clase Pagina
     */
    public static function insertar(){}

    /**
     * La eliminaci&oacute;n de un contenido se hace por la clase Pagina
     */
    public static function eliminar( $_id ){}

    /**
     * Trae el listado de p&aacute;ginas de tipo contenido del portal
     * @return array
     * @throws MySQLException
     */
    public static function listado(){
        try {
            $listado = array();
            $conexion = Conexion::getInstance();
            $rs = $conexion->consulta("SELECT * FROM contenido c INNER JOIN pagina p ON c.id = p.id");
            foreach ($rs as $fila) {
                $padre = null;
                if( $fila["padre"] != null ){
                    $padre = Pagina::cargar($fila["padre"]);
                }
                array_push(
                    $listado,
                    new Contenido(
                        $fila["id"],
                        $fila["nombre_es"],
                        $fila["nombre_en"],
                        $padre,
                        (($fila["privada"] == 1)?true:false),
						$fila["imagen"],
                        $fila["texto_es"],
                        $fila["texto_en"]
                    )
                );
            }
            return $listado;
        }
        catch (MySQLException $e ){
            throw $e;
        }
    }

    /**
     * Trae el texto del contenido en espa&ntilde;ol
     * @return string
     */
    public function getTextoEs() {
        return $this->texto_es;
    }

    /**
     * Cambia el texto del contenido en espa&ntilde;ol
     * @param string $_texto_es
     * @throws MySQLException
     */
    public function setTextoEs( $_texto_es ) {
        if( strcmp( $this->nombre, $_texto_es ) != 0 ) {
            $this->nombre = $_texto_es;
            $conexion = Conexion::getInstance();
            $conexion->consulta(
                "UPDATE contenido
                SET texto_es = '".$this->nombre."'
                WHERE id = ".$this->id);
        }
    }

    /**
     * Trae el texto del contenido en ingl&eacute;s
     * @return string
     */
    public function getTextoEn() {
        return $this->texto_en;
    }

    /**
     * Cambia el texto del contenido en ingl&eacute;s
     * @param string $_texto_en
     * @throws MySQLException
     */
    public function setTextoEn( $_texto_en ) {
        if( strcmp($this->texto_en, $_texto_en) != 0 ){
            $this->texto_en = $_texto_en;
            try {
                $this->actualizar();
            }
            catch (Exception $e) {
                throw $e;
            }
        }
    }

    /**
     * Texto del contenido en espa&ntilde;ol
     * @var string
     */
    protected $texto_es;

    /**
     * Texto del contenido en ingl&eacute;s
     * @var string
     */
    protected $texto_en;
}

?>