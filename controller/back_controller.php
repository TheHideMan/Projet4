<?php 
require_once('model/back_manager.php');

class BackController {

    public function connexion() {
        
        $backManager = new BackManager;
        if(isset($_POST['connexion'])) {
            if(empty($_POST['user'])) {
                echo "<p>Le champ Utilisateur est vide</p>";
            } 
            if(empty($_POST['password'])){
                echo "<p>Le champ Mot de passe est vide</p>";
            }
            $Pseudo = htmlentities($_POST['user'], ENT_QUOTES, "ISO-8859-1");
            $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            $reponse = $backManager->getLogin($Pseudo, $MotDePasse);
            if($reponse == false) {
                header('Location: /Projet4/index.php');
            } else {
                header('Location: /Projet4/index.php?action=pageAdmin');
                $_SESSION['pseudo'] = $Pseudo;
            }
        }
    }

    public function deconnexion() {
        session_destroy();
        header('Location: /Projet4/index.php ');
    }


    public function afficheAllPost() {
        $backManager = new BackManager;
        $reponse = $backManager -> getAllPosts();

        return($reponse);
    }

    public function afficheReportedPost() {
        $backManager = new BackManager;
        $reponse = $backManager -> getReportedPosts();

        return($reponse);
    }

    public function delPost($id) {
        $backManager = new BackManager;
        $localisation = '/Projet4/index.php?action=administration';

        $backManager -> deletePost($id);
        header ("Location: $localisation");
    }

    public function signaler($id) {
        $backManager = new BackManager;
        $localisation = '/Projet4/index.php?action=articles';

        $backManager -> reportPost($id);
        header ("Location: $localisation");
    }

}

?> 