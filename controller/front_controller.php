<?php

require_once('model/user_manager.php');

class FrontController {
    
    public function afficheArticle() {
        $userManager = new UserManager;
        $reponse = $userManager -> getLastArticle();
        
        while($donnes = $reponse -> fetch()) {
            ?>
            <p>
                <strong><?php echo $donnes['date_publication']; ?></strong> : <?php echo $donnes['titre']; ?> <br/>
                <?php echo $donnes['contenu']; ?>
            </p>
            <?php
        }
        
    }
    
    public function afficheAllArticles() {
        $userManager = new UserManager;
        $reponse = $userManager -> getAllArticles();
        
        $reponse -> execute();
        return($reponse);
    }
    
    
    public function afficheArticleDemande($titre) {
        $userManager = new UserManager;
        $reponse = $userManager -> demandeArticle($titre);
        $reponse -> execute();

        $retour = $userManager -> getPosts($titre);
        $retour -> execute();

        $tab_retour = array($reponse, $retour);

        return($tab_retour);
    
    }
    
    public function afficheAllChapters() {
        $userManager = new UserManager;
        $reponse = $userManager -> getAllChapters();
        
        $reponse -> execute();
        return($reponse);
    }

    public function afficheChapitreDemande($id) {
        $userManager = new UserManager;
        $reponse = $userManager -> demandeChapitre($id);

        $reponse -> execute();
        return($reponse);
    
    }

    public function send() {
        if (isset($_POST['message'])) {
            $position_arobase = strpos($_POST['email'], '@');
            if ($position_arobase === false) {
                echo '<p>Votre email doit comporter un arobase. </p>';
            } else {
                $retour = mail('jeanforteroche@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['nom'], $_POST['prenom']);
                if ($retour) {
                    echo '<p> Votre message a bien été envoyé. </p>';
                } else {
                    echo '<p> Erreur.</p>';
                }
            }
        }
    }

    public function sendPost($titre) {
        $userManager = new UserManager;
        $localisation = '/Projet4/index.php?action=currentArticle&titre=' . $_GET['titre'];

        if(isset($_POST['poster'])) {
            if(isset($_POST['pseudo'], $_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']) AND strlen($_POST['pseudo']) < 25)  {
                $userManager -> ajoutePost($_GET['titre'], $_POST['commentaire']);
                header("Location: $localisation ");
            } else {
                header("Location: $localisation ");

            }
        }
        
    }

    public function sendChapter() {
        $userManager = new UserManager;
        $localisation = '/Projet4/index.php?action=administration';

        $userManager -> ajouteChapter($_POST['titre'], $_POST['contenu']);
        header("Location: $localisation");
    }
        

    public function sendArticle() {
        $userManager = new UserManager;
        $localisation = '/Projet4/index.php?action=administration';

        $userManager -> ajouteArticle($_POST['titre'], $_POST['date'], $_POST['contenu']);
        header("Location: $localisation");
    }



}
?>