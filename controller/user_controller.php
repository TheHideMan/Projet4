<?php 
require_once('model/user_manager.php');

class UserController {

    public function connexion() {
        $userManager = new UserManager;
        if(isset($_POST['connexion'])) {
            if(empty($_POST['user'])) {
                echo "<p>Le champ Utilisateur est vide</p>";
            } 
            if(empty($_POST['password'])){
                echo "<p>Le champ Mot de passe est vide</p>";
            }
            $Pseudo = htmlentities($_POST['user'], ENT_QUOTES, "ISO-8859-1");
            $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            $reponse = $userManager->getLogin($Pseudo, $MotDePasse);
            if($reponse == false) {
                header('Location: index.php');
            } else {
                header('Location: /Projet4/index.php?action=administration');
                $_SESSION['pseudo'] = $Pseudo;
            }
        }
    }

    public function deconnexion() {
        session_destroy();
        header('Location: /Projet4/index.php ');
    }






}

?>