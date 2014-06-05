<?php

class Login extends DB {
    //put your code here
    private $email;
    private $password;
    
    private $errors = array();
    
    function __construct() {
           
        $this->email = filter_input(INPUT_POST, 'email');
        $this->password = filter_input(INPUT_POST, 'password');
        $this->setDb();
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
        $this->emailEntryIsValid();
        $this->passwordEntryIsValid();
        
        return ( count($this->errors) ? false : true );
    }
    
    public function getErrorMessageHTML($key, $arr) {
        $msg = ( is_array($arr) && array_key_exists($key, $arr) ? $arr[$key] : NULL );
        return ( is_string($msg) && !empty($msg) ? "<p class=\"error\">$msg</p>" : "" );
    }
    
    public function checkLogin(){
        
        $id = 0;
        $password = sha1($this->password);
        
        if ( null !== $this->getDB() ) {
                $statement = $this->getDB()->prepare('select * from users where email = :email and password = :password limit 1');
                $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
                $statement->bindParam(':password', $password, PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $id = $result['user_id'];
            }
            return $id;
    }
}
