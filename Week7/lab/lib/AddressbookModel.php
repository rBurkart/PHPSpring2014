<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressbookModel
 *
 * @author GFORTI
 */
class AddressbookModel {
    //put your code here
    
    public $address;
    public $city;
    public $state;
    public $zip;
    public $name;
    public $id;
    
    
    function __construct($paramArr) {        
        $this->map($paramArr);
    }

    
    /**
    * A public method to map all the variables to a value
    *
    * @param Array $paramArr
    *
    * @return Void
    */ 
    public function map($paramArr) {
        
        if ( ! is_array($paramArr) ) {
            return false;
        }
        
        if ( array_key_exists('address', $paramArr) ) {
            $this->setAddress($paramArr['address']);
        }
        if ( array_key_exists('city', $paramArr) ) {
            $this->setCity($paramArr['city']);
        }
        if ( array_key_exists('state', $paramArr) ) {
            $this->setState($paramArr['state']);
        }
        if ( array_key_exists('zip', $paramArr) ) {
            $this->setZip($paramArr['zip']);
        }
        if ( array_key_exists('name', $paramArr) ) {
            $this->setName($paramArr['name']);        
        }
        if ( array_key_exists('id', $paramArr) ) {
            $this->setId($paramArr['id']);
        }
        
        
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZip() {
        return $this->zip;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setId($id) {
        $this->id = $id;
    }


    
}
