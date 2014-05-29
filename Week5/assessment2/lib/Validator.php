<?php

class Validator {
    
    public static function nameIsValid($name) {
        return ( is_string($name) && !empty($name) );       
    }
    
    public static function commentIsValid($comment) {
        
        return ( is_string($comment) && !empty($comment) && strlen($comment) <= 150);
    }
}