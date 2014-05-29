<?php

class Signup {

    private $username;
    private $state_list;
    private $comment;
   
    private $errors = array();
            
    function __construct() {
       
        $this->username = filter_input(INPUT_POST, 'username');      
        $this->state_list = filter_input(INPUT_POST, 'state');
        $this->comment = filter_input(INPUT_POST, 'comment');
    }

    public function getUsername() {
        return $this->username;
    }

    public function getState() {
        return $this->state_list;
    }

    public function getComment() {
        return $this->comment;
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function usernameEntryIsValid() {
        
         //todo put logic here (same as email)
        $username = $this->getUsername();
        
        if ( empty($username) )
        {
            $this->errors["username"] = "Username is missing.";
        }
        else if ( !Validator::nameIsValid($this->getUsername()) )
        {
            $this->errors["username"] = "Username is not valid.";
        }
        
        
        return ( empty($this->errors["username"]) ? true : false ) ;
    }
    
    public function commentEntryIsValid() {
        $comment = $this->getComment();
        
        if(empty($comment))
        {
            $this->errors["comment"] = "Comment is missing.";
        }
        else if (strlen($comment) > 150)
        {
            $this->errors["comment"] = "Comment Cannot exceed 150 characters.";
        }
        
        return ( empty($this->errors["comment"]) ? true : false ) ;
    }
        
    public function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    public function entryIsValid(){
        $this->usernameEntryIsValid();
        $this->commentEntryIsValid();
        
        return ( count($this->errors) ? false : true );
    }
    
    public function getErrorMessageHTML($key, $arr) {
        $msg = ( is_array($arr) && array_key_exists($key, $arr) ? $arr[$key] : NULL );
        return ( is_string($msg) && !empty($msg) ? "<p class=\"error\">$msg</p>" : "" );
    }
    
}