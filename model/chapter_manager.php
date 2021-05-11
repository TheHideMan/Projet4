<?php 
require_once("manager.php");

class ChapterManager extends Manager {

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


    public function ajouteChapter($titre, $contenu) {
        $db = $this -> dbconnect();
        $req = $db -> prepare("INSERT INTO chapitres (titre, manu) VALUE (?, ?)");
        $req -> execute(array($titre, $contenu));
    }


}

?>