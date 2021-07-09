<?php 
require_once('model/user_manager.php');

class UserController {

    public function inscription() {
        $userManager = new UserManager;

       /* $pseudo = $_POST['user'];
        $password = password_hash($_POST['password'] ,PASSWORD_DEFAULT);

        $userManager -> setLogin($pseudo, $password);
*/
        $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['user']);
        if(!$verif_caractere && (strlen($_POST['user']) < 1 || strlen($_POST['user']) > 20)) {
            $content = "<div> Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9 </div>";
        } else {
            $hashPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            /*$membre = $userManager -> executeRequete("SELECT * FROM membres WHERE pseudo=' $_POST[user]'");
            if($membre -> num_rows > 0) {
                $content = "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
            } else {
                foreach($_POST as $indice => $valeur) {
                    $_POST[$indice] = htmlEntities(addSlashes($valeur));
                }*/
                $userManager -> setLogin($_POST['user'], $hashPass);
                header('Location: /Projet4/index.php');
                
            /*}*/
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