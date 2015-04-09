<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySQLException
 *
 * @author Cristian
 */
class MySQLException extends Exception {
    
    public function __construct($message, $code) {
        parent::__construct($message, $code);
    }
    
    public function getMensajeException(){
        return "<b>error($this->code):</b>$this->message<br />,
                <b>archivo:</b> $this->file <br />, 
                <b>linea</b> $this->line";
    }

}

?>
