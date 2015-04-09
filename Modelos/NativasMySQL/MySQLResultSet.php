<?php

include_once("MySQLException.php");

class MySQLResultSet {
    
    private $consulta;
    private $resultset;
    private $id_conexion;
    
    public function __construct($sentenciaSQL,
                                $conexion){
        $this->consulta=$sentenciaSQL;
        $this->id_conexion=$conexion;
        $this->resultset=mysql_query($this->consulta, 
                         $this->id_conexion);
        if(!$this->resultset)
                throw new MySQLException(mysql_error(),
                                         mysql_errno());
    }
    
    
    public function getNumeroFilas(){
        return mysql_num_rows($this->resultset);
    }
    
    public function getFilasAfectadas(){
        return mysql_affected_rows($this->id_conexion);
    }
    
    public function getNumeroColumnas(){
        return mysql_num_fields($this->resultset);
    }
    
    public function getIdInsertado(){
        return mysql_insert_id($this->id_conexion); 
    }
    
    
    
    public function getFila(){
        return mysql_fetch_array($this->resultset);
    }
    
    
    
    
    
    
}

?>
