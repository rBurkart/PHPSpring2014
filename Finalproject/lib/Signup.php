<?php

class Signup extends DB {

    private $website;
    private $email;
    private $password;
   
    private $errors = array();
            
    function __construct() {
       
        $this->website = filter_input(INPUT_POST, 'website');      
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->setDb();
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
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function websiteEntryIsValid() {
        
        $website = $this->getWebsite();
        
        if ( empty($website)) {
            $this->errors["website"] = "Website is missing.";
        } else if (!Validator::websiteIsValid($this->getWebsite()) ) {
            $this->errors["website"] = "Website is not valid.";
        }
        return ( empty($this->errors["website"]) ? true : false ) ;
    }
    
    public function emailEntryIsValid() {
        
         $email = $this->getEmail();
         
         if ( empty($email) ) {
            $this->errors["email"] = "Email is missing.";
         } else if ( !Validator::emailIsValid($this->getEmail()) ) {
            $this->errors["email"] = "Email is not valid.";                
         }
        
        return ( empty($this->errors["email"]) ? true : false ) ;
    }
    
    public function passwordEntryIsValid() {

        $password = $this->getPassword();
        
        if ( empty($password) )
        {
            $this->errors["password"] = "password is missing.";
        }
        else if ( !Validator::passwordIsValid($this->getPassword()) )
        {
            $this->errors["password"] = "Password must be 6 character or more";
        }
        
        return ( empty($this->errors["password"]) ? true : false ) ;
    }
        
    public function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    public function entryIsValid(){
        $this->websiteEntryIsValid();
        $this->emailEntryIsValid();
        $this->passwordEntryIsValid();
        
        return ( count($this->errors) ? false : true );
    }
    
    public function getErrorMessageHTML($key, $arr) {
        $msg = ( is_array($arr) && array_key_exists($key, $arr) ? $arr[$key] : NULL );
        return ( is_string($msg) && !empty($msg) ? "<p class=\"error\">$msg</p>" : "" );
    }
    
    public function save( SignupModel $dataModel ){
        $result = false;
        
        $website = $dataModel->getWebsite();
        $email = $dataModel->getEmail();
        $password = sha1($dataModel->getPassword());
               
         if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('insert into users set website = :website, email = :email, password = :password');
            $dbs->bindParam(':website', $website, PDO::PARAM_STR);
            $dbs->bindParam(':email', $email, PDO::PARAM_STR);
            $dbs->bindParam(':password', $password, PDO::PARAM_STR);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = intval($this->getDB()->lastInsertId());
            }
        
         }   
        
        return $result;
    }
    
}