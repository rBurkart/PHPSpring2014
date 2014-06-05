<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminModel
 *
 * @author Ryan
 */
class AdminModel {
    //put your code here
    
    public $user_id;
    public $title;
    public $theme;
    public $address;
    public $phone;
    public $email;
    public $about;
    
    
    function __construct($paramArr) {        
        $this->map($paramArr);
    }

    
    public function map($paramArr) {
        
        if ( ! is_array($paramArr) ) {
            return false;
        }
        
        if ( array_key_exists('user_id', $paramArr) ) {
            $this->setUser_id($paramArr['user_id']);
        }
        if ( array_key_exists('title', $paramArr) ) {
            $this->setTitle($paramArr['title']);
        }
        if ( array_key_exists('theme', $paramArr) ) {
            $this->setTheme($paramArr['theme']);
        }
        if ( array_key_exists('address', $paramArr) ) {
            $this->setAddress($paramArr['address']);
        }
        if ( array_key_exists('phone', $paramArr) ) {
            $this->setPhone($paramArr['phone']);
        }
        if ( array_key_exists('email', $paramArr) ) {
            $this->setEmail($paramArr['email']);        
        }
        if ( array_key_exists('about', $paramArr) ) {
            $this->setAbout($paramArr['about']);
        }
        
        
    }
    
    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

        
    public function getTitle() {
        return $this->title;
    }

    public function getTheme() {
        return $this->theme;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAbout() {
        return $this->about;
    }
    

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAbout($about) {
        $this->about = $about;
    }
}
