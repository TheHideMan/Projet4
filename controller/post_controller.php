<?php 
require_once('model/post_manager.php');

class PostController {

    public function sendPost($titre) {
        $postManager = new PostManager;
        $localisation = 'index.php?action=currentArticle&titre=' . $_GET['titre'];

        if(isset($_POST['poster'])) {
            if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']) AND strlen($_POST['pseudo']) < 25)  {
                $postManager -> ajoutePost($_GET['titre'], $_POST['commentaire']);
                header("Location: $localisation");
                /*echo "<script> window.location.href = 'index.php?action=currentArticle&titre=' . $_GET['titre'] </script>";*/
            } else {
                /*echo "<script> window.location.href = 'index.php?action=currentArticle&titre=' . $_GET['titre'] </script>";*/
                header("Location: $localisation");

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

        $postManager -> deletePost($id);
        echo "<script> window.location.href = 'index.php?action=administration' </script>";
    }

    public function signaler($id) {
        $postManager = new PostManager;

        $postManager -> reportPost($id);
        echo "<script> window.location.href = 'index.php?action=articles' </script>";
    }
}



?>