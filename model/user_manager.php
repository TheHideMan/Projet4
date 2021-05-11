<?php 
require_once("manager.php");

class UserManager extends Manager {

    public function getLogin($Pseudo, $MotDePasse){
        $db = $this ->dbconnect();
        $req = $db -> prepare("SELECT * FROM connexion WHERE User = :user AND Password = :pass");
        $req -> bindValue(':user', $Pseudo, PDO::PARAM_STR);
        $req -> bindValue(':pass', $MotDePasse, PDO::PARAM_STR);
        $req -> execute();
        return $req -> fetch();
    }

}

?>