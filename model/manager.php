<?php 

class Manager {
    
    protected function dbconnect() {
        $db = new PDO('mysql:host=localhost; dbname=projet4; charset=utf8', 'root', 'root');
        return $db;
    } 

    protected function executeRequete($requete) {
        $db = $this -> dbconnect();
        $req = $db -> query($requete);
        return $req;
    }
}


?>