<?php 
    require_once("manager.php");

class BackManager extends Manager {

    public function getLogin($Pseudo, $MotDePasse){
        $db = $this ->dbconnect();
        $req = $db -> prepare("SELECT * FROM connexion WHERE User = :user AND Password = :pass");
        $req -> bindValue(':user', $Pseudo, PDO::PARAM_STR);
        $req -> bindValue(':pass', $MotDePasse, PDO::PARAM_STR);
        $req -> execute();
        return $req -> fetch();
    }

    public function getAllPosts() {
        $db = $this -> dbconnect();
        $req = $db -> query("SELECT * FROM posts ORDER BY article_commenté");
        $req -> execute();

        return $req;
    }

    public function getReportedPosts() {
        $db = $this -> dbconnect();
        $req = $db -> query("SELECT * FROM posts WHERE signale = 1 ORDER BY article_commenté ");

        $req -> execute();
        return $req;
    }

    public function deletePost($id) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("DELETE FROM posts WHERE id_post = :id");
        $req -> bindValue(':id', $id, PDO::PARAM_INT);
        $req -> execute();

    }

    public function reportPost($id) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("UPDATE posts SET signale = 1 WHERE id_post = :id");
        $req -> bindValue(':id', $id, PDO::PARAM_INT);
        $req -> execute();
    }

}


?>