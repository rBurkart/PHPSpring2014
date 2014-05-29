<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Passcode
 *
 * @author GFORTI
 */
class Passcode {
    //put your code here
    
    private $passcode;
    
    function __construct() {
        $this->setPasscode(filter_input(INPUT_POST, 'passcode'));
    }
    
    /**
    * A public method that returns a user passcode
    * 
    * @return string
    */ 
    public function getPasscode() {
        return $this->passcode;
    }

    /**
    * A public method that sets a user passcode
    *
    * @param string passcode 
    * 
    * @return void
    */ 
    public function setPasscode($passcode) {
        $this->passcode = $passcode;
    }
    
    /**
    * A public method that checks for a valid passcode
    * 
    * @return boolean
    */ 
    public function isValidPasscode(){
        // shortcut for if else checks to see if true (else) : false
        return ( $this->getPasscode() === Config::PASS_CODE ? true : false );
    }



}
