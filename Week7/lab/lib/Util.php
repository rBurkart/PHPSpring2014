<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author GFORTI
 */
class Util {
    //put your code here
    
    /**
    * A static method to check if a Post request has been made.
    *    
    * @return boolean
    */    
    public static function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    /**
    * A static method to check if a Get request has been made.
    *    
    * @return boolean
    */    
    public static function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
    /**
    * A static method to create a error message template in HTML.
    *   
    * @param string $key must be a valid array key 
    * @param array $arr must be a valid array
     *  
    * @return string
    */ 
    public static function getErrorMessageHTML($key, $arr) {
        $msg = ( is_array($arr) && array_key_exists($key, $arr) ? $arr[$key] : NULL );
        return ( is_string($msg) && !empty($msg) ? "<p class=\"error\">$msg</p>" : "" );
    }
    
    public static function redirect($page) {
        //if ( Validator::pageIsValid($name))
        header("location: $page.php");
        die();
    }
    
    
    public static function confirmAccess() {
        if ( !isset($_SESSION['validcode']) || !$_SESSION['validcode'] ) {
           Util::redirect('index');
        }
    }
    
}
