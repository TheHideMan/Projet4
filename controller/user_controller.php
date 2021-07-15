<?php 
require_once('model/user_manager.php');

class UserController {

    public function inscription() {
        $userManager = new UserManager;

        $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['user']);
        if(!$verif_caractere && (strlen($_POST['user']) < 1 || strlen($_POST['user']) > 20)) {
            $content = "<div> Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9 </div>";
        } else {
            $hashPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userManager -> setLogin($_POST['user'], $hashPass);
            header('Location: /Projet4/index.php');
                
          
        }
    }

    public function connexion() {
        $userManager = new UserManager;
        if(isset($_POST['connexion'])) {
            if(empty($_POST['user'])) {
                echo "<p>Le champ Utilisateur est vide</p>";
            } 
            if(empty($_POST['password'])){
                echo "<p>Le champ Mot de passe est vide</p>";
            }
            $pseudo = htmlentities($_POST['user'], ENT_QUOTES, "ISO-8859-1");
            $motDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            $reponse = $userManager->getLogin($pseudo, $motDePasse);
            if($reponse == false) {
                header('Location: index.php');
            } else if (password_verify($motDePasse, $reponse[1])) {
                header('Location: /Projet4/index.php?action=administration');
                $_SESSION['pseudo'] = $pseudo;
            } else {
                header('Location: index.php');
            }
        }
    }

    public function deconnexion() {
        session_destroy();
        header('Location: /Projet4/index.php ');
    }

}

?>