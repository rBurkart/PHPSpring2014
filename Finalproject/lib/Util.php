<?php

class Util {
  
    public static function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
   
    public static function isGetRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
    }
    
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