<?php 
require_once("manager.php");

class UserManager extends Manager {
/*
    public function executeRequete($requete) {
        $db = $this -> dbconnect();
        $req = $db -> query($requete);
        return $req;
    }
*/
    public function getLogin($Pseudo, $MotDePasse){
        $db = $this -> dbconnect();
        $req = $db -> prepare("SELECT * FROM connexion WHERE User = :user AND Password = :pass");
        $req -> bindValue(':user', $Pseudo, PDO::PARAM_STR);
        $req -> bindValue(':pass', $MotDePasse, PDO::PARAM_STR);
        $req -> execute();
        return $req -> fetch();
    }

    public function setLogin($pseudo, $password) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("INSERT INTO connexion (User, Password) WHERE User = :user, Password = :pass");
        $req -> bindValue (':user', $pseudo, PDO::PARAM_STR);
        $req -> bindValue (':pass', $password, PDO::PARAM_STR);
        $req -> execute();
        
    }
    
}

?>