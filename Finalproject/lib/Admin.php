<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Ryan
 */
class Admin extends DB {
    //put your code here
    
    function __construct() {
        $this->setDb();
    }
    
    public function update(AdminModel $AdminModel) {
        $result = false;
        
        
         if ( null !== $this->getDB()) {
            $dbs = $this->getDB()->prepare('update about_page set title = :title, theme = :theme, address = :address, email = :email, about = :about where user_id = :user_id');
            $dbs->bindParam(':user_id', $AdminModel->user_id, PDO::PARAM_INT);
            $dbs->bindParam(':title', $AdminModel->title, PDO::PARAM_INT);
            $dbs->bindParam(':theme', $AdminModel->theme, PDO::PARAM_STR);
            $dbs->bindParam(':address', $AdminModel->address, PDO::PARAM_STR);
            $dbs->bindParam(':phone', $AdminModel->phone, PDO::PARAM_STR);
            $dbs->bindParam(':email', $AdminModel->email, PDO::PARAM_STR);
            $dbs->bindParam(':about', $AdminModel->about, PDO::PARAM_STR);
            
            //I Could not figure out what I needed to do from here.
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $result = true;
            }
        
         }   
        
        return $result;
    }
    
    public function select($id)
    {
           $results = array();
           
            if ( null !== $this->getDB() ) {
            $dbs = $this->getDB()->prepare('select * from about_page where user_id = :id limit 1');
            $dbs->bindParam(':id', $id, PDO::PARAM_INT);
            
            if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $results = $dbs->fetch(PDO::FETCH_ASSOC);
            }
        
         }   
           
           return $results;
    }
}
