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
        $localisation = '/Projet4/index.php?action=administration';

        $chapterManager -> ajouteChapter($_POST['titre'], $_POST['contenu']);
        header("Location: $localisation");
    }
        
    public function delChapter($id) {
        $chapterManager = new ChapterManager;
        $localisation = '/Projet4/index.php?action=administration';

        $chapterManager -> deleteChapter($id);
        header ("Location: $localisation");
    }

    public function upChapter($id, $titre, $txt) {
        $chapterManager = new ChapterManager;
        $localisation = '/Projet4/index.php?action=administration';

        $chapterManager -> updateChapitre($id, $titre, $txt);
        header ("Location: $localisation");
    }

    public function modifierChapitre($id) {
        $chapterManager = new ChapterManager;

        $retour = $chapterManager -> modifierChapitre($id);
        return ($retour);

    }
    



}
?>