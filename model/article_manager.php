<?php 
require_once("manager.php");

class ArticleManager extends Manager {

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

    public function ajouteArticle($titre, $date, $contenu) {
        $db = $this -> dbconnect(); 
        $req = $db  -> prepare("INSERT INTO articles (date_publication, titre, contenu) VALUE (?, ?, ?) ");
        $req -> execute(array($date, $titre, $contenu));
    }

    public function deleteArticle($id) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("DELETE FROM articles WHERE id = :id");
        $req -> bindValue(':id', $id, PDO::PARAM_INT);
        $req -> execute();
    }

    public function modifierArticle($id) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("SELECT id, date_publication, titre, contenu FROM articles WHERE id = :id");
        $req -> bindValue(':id', $id, PDO::PARAM_INT);
        $req -> execute();
        return $req;
    }

    public function updateArticle($id, $dp, $titre, $txt) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("UPDATE articles SET date_publication = :dp, titre = :titre, contenu = :txt WHERE id = :id");
        $req -> bindValue(':id', $id, PDO::PARAM_INT);
        $req -> bindValue(':dp', date("Y-m-d H:i:s", strtotime($dp)), PDO::PARAM_STR);
        $req -> bindValue(':titre', $titre, PDO::PARAM_STR);
        $req -> bindValue(':txt', $txt, PDO::PARAM_STR);
        $req -> execute();
    }
}
?>