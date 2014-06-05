<?php

class Validator {
    
    public static function websiteIsValid($website) {
        return ( is_string($website) && !empty($website) );       
    }
    
    public static function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) != false );
    }

    public static function passwordIsValid($password) {
        
        return ( is_string($password) && !empty($password) && strlen($password) >= 6);
    }
}
