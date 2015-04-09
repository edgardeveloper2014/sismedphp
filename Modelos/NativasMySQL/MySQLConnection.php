<?php

include_once("MySQLResultSet.php");
include_once(dirname(dirname(dirname(__FILE__))) . "/db-config.php");

class MySQLConnection {

    private $id_conexion;
    private $servidor;
    private $usuario;
    private $password;
    private $database;
    
    private static $instancia;

    private  function __construct() {
        $this->servidor = DB_SERVER;
        $this->usuario = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_NAME;
    }

    public function conectar(){
        $this->id_conexion = @mysql_connect($this->servidor, $this->usuario, $this->password);
        if (!$this->id_conexion)
            throw new MySQLException(mysql_error(),
                    mysql_errno());
        if(!@mysql_select_db($this->database,$this->id_conexion))
            throw new MySQLException(mysql_error(),
                    mysql_errno());    
    }
    
    public static function getInstancia(){
        if(!self::$instancia instanceof self){
            self::$instancia=new self();
        }
        return self::$instancia;
   }
    
    
    
    
    
    
    
    public function crearResultSet($sentenciaSQL){
        return new MySQLResultSet($sentenciaSQL,  $this->id_conexion);
    }
    
    //Patron de Singleton
    //Solo exista una instancia de una clase determinada
    
    //1. Crear un atributo estatico de clase(variable estatica)
    //2. La clase debe tener un constructor PRIVADO
    //3. Crear  un metodo estático PUBLICO que permita crear una instancia
    //   De la clase AL INTERIOR DE LA CLASE 
    
    

}

?>
