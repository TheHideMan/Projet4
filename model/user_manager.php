<?php 
require_once("manager.php");

class UserManager extends Manager {

    public function getLogin($pseudo){
        $db = $this -> dbconnect();
        $req = $db -> prepare("SELECT * FROM connexion WHERE User = :user ");
        $req -> bindValue(':user', $pseudo, PDO::PARAM_STR);
        $req -> execute();
        return $req -> fetch();
    }

    public function setLogin($pseudo, $password) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("INSERT INTO connexion (User, Password) VALUES (:user,  :pass)");
        $req -> bindValue (':user', $pseudo, PDO::PARAM_STR);
        $req -> bindValue (':pass', $password, PDO::PARAM_STR);
        $req -> execute();
        
    }
    
}

?>