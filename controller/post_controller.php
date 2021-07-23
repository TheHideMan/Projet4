<?php 
require_once('model/post_manager.php');

class PostController {

    public function sendPost($ida) {
        $postManager = new PostManager;
        $localisation = '/Projet4/index.php?action=currentArticle&id=' . $_GET['ida'];

        if(isset($_POST['poster'])) {
            if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']) AND strlen($_POST['pseudo']) < 25)  {
                $postManager -> ajoutePost($_GET['ida']);
                header("Location: $localisation ");
            } else {
                header("Location: $localisation ");

            }
        }
    }

    public function afficheAllPost() {
        $postManager = new PostManager;
        $reponse = $postManager -> getAllPosts();

        return($reponse);
    }

    public function afficheReportedPost() {
        $postManager = new PostManager;
        $reponse = $postManager -> getReportedPosts();

        return($reponse);
    }

    public function delPost($id) {
        $postManager = new PostManager;
        $localisation = '/Projet4/index.php?action=administration';

        $postManager -> deletePost($id);
        header ("Location: $localisation");
    }

    public function signaler($id) {
        $postManager = new PostManager;
        $localisation = '/Projet4/index.php?action=articles';

        $postManager -> reportPost($id);
        header ("Location: $localisation");
    }
}



?>