<?php 

class Manager {
    
    protected function dbconnect() {
        $db = new PDO('mysql:host=db5002476195.hosting-data.io; dbname=dbs1973451; charset=utf8', 'dbu269547', 'JeanForteroche');
        return $db;
    } 
}


?>