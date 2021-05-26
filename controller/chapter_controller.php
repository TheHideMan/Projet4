<?php
require_once('model/chapter_manager.php');


class ChapterController {
    
    public function afficheAllChapters() {
        $chapterManager = new ChapterManager;
        $reponse = $chapterManager -> getAllChapters();
        
        $reponse -> execute();
        return($reponse);
    }

    public function afficheChapterDemande($id) {
        $chapterManager = new ChapterManager;
        $reponse = $chapterManager -> demandeChapitre($id);

        $reponse -> execute();
        return($reponse);
    
    }

    public function sendChapter() {
        $chapterManager = new ChapterManager;

        $chapterManager -> ajouteChapter($_POST['titre'], $_POST['contenu']);
        echo "<script> window.location.href = 'index.php?action=administration' </script>";
    }
        

    



}
?>