<?php

/**
 * Description of DB
 *
 * @author GForti
 */
class DB {
    
    protected $db = null;
    
    public function setDb() {
        try {
            $this->db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);
        } catch (Exception $ex) {
           $this->closeDB();
        }
    }

    public function getDB() {            
        return $this->db;        
    }
    
     public function closeDB() {        
        $this->db = null;        
    }
        
}
