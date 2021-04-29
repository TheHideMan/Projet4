<?php 
require_once("manager.php");

class UserManager extends Manager {
    
     public function getLastArticle() {
        $db = $this ->dbconnect();
        $req = $db -> query("SELECT id, date_publication, titre, SUBSTRING(contenu, 1, 200) AS contenu FROM articles ORDER BY date_publication DESC LIMIT 3");
        return $req;
    }
    
    public function getAllArticles() {
        $db = $this -> dbconnect();
        $req = $db -> query("SELECT id, date_publication, titre, SUBSTRING(contenu, 1, 200) AS contenu FROM articles ORDER BY date_publication DESC");
        return $req;
    }
    
    public function demandeArticle($titre) {
        $db = $this -> dbconnect();
        $req = $db -> prepare ("SELECT id, date_publication, titre, contenu FROM articles WHERE titre = :titre");
        $req -> bindValue(':titre', $titre, PDO::PARAM_STR);
        $req -> execute();
        return $req;
    }


    public function getAllChapters() {
        $db = $this -> dbconnect();
        $req = $db -> query("SELECT id, titre, SUBSTRING(manu, 1, 200) AS manu FROM chapitres ORDER BY id ");
        return $req;
    }
    
    public function demandeChapitre($id) {
        $db = $this -> dbconnect();
        $req = $db -> prepare ("SELECT id, titre, manu FROM chapitres WHERE id = :ID");
        $req -> bindValue(':ID', $id, PDO::PARAM_STR);
        $req -> execute();
        return $req;
    }


    public function ajoutePost($titre, $commentaire) {
        $db = $this -> dbconnect();

        $cal = date('y-m-d h:i:s');
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $commentaire = htmlspecialchars($_POST['commentaire']);

        $insert = $db -> prepare('INSERT INTO posts (article_commenté, cal, pseudo, contenu) VALUE (?, ?, ?, ?)');
        $insert->execute(array($titre, $cal, $pseudo, $commentaire));
       
    }


    public function getPosts($titre) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("SELECT id_post, cal, pseudo, contenu FROM posts WHERE article_commenté = :titre ORDER BY cal");
        $req -> bindValue(':titre', $titre,  PDO::PARAM_STR);
        $req -> execute();

        return $req;
    }

    public function ajouteChapter($titre, $contenu) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("INSERT INTO chapitres (titre, manu) VALUE (?, ?)");
        $req -> execute(array($titre, $contenu));
    }

    public function ajouteArticle($titre, $date, $contenu) {
        $db = $this -> dbconnect(); 
        $req = $db  -> prepare("INSERT INTO articles (date_publication, titre, contenu) VALUE (?, ?, ?) ");
        $req -> execute(array($date, $titre, $contenu));
    }

}



?>