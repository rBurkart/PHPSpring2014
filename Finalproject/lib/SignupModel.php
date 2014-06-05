<?php

class SignupModel {
    
    private $website;
    private $email;
    private $password;
    
    
     function __construct($paramArr = array()) {        
        $this->map($paramArr);
    }

    
    public function map($paramArr) {
        
        if ( ! is_array($paramArr) ) {
            return false;
        }
        
        if ( array_key_exists('website', $paramArr) ) {
            $this->setWebsite($paramArr['website']);
        }
        if ( array_key_exists('email', $paramArr) ) {
            $this->setEmail($paramArr['email']);
        }
        if ( array_key_exists('password', $paramArr) ) {
            $this->setPassword($paramArr['password']);
        }
        
    }
    

    public function getWebsite() {
        return $this->website;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }

    
    public function setWebsite($username) {
        $this->website = $username;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


}
