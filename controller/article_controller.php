<?php 
require_once('model/article_manager.php');

class ArticleController {

    public function afficheArticle() {
        $articleManager = new ArticleManager;
        $reponse = $articleManager -> getLastArticle();
        
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
        $articleManager = new ArticleManager;
        $reponse = $articleManager -> getAllArticles();
        
        $reponse -> execute();
        return($reponse);
    }
    
    public function afficheArticleDemande($titre) {
        $articleManager = new ArticleManager;
        $postManager = new PostManager;
        $reponse = $articleManager -> demandeArticle($titre);
        $reponse -> execute();

        $retour = $postManager -> getPosts($titre);
        $retour -> execute();

        $tab_retour = array($reponse, $retour);

        return($tab_retour);
    
    }

    public function sendArticle() {
        $articleManager = new ArticleManager;
        $localisation = '/Projet4/index.php?action=administration';

        $articleManager -> ajouteArticle($_POST['titre'], $_POST['date'], $_POST['contenu']);
        header("Location: $localisation");
    }

    public function delArticle($id) {
        $articleManager = new ArticleManager;
        $localisation = '/Projet4/index.php?action=administration';

        $articleManager -> deleteArticle($id);
        header ("Location: $localisation");
    }

    public function upArticle($id, $dp, $titre, $txt) {
        $articleManager = new ArticleManager;
        $localisation = '/Projet4/index.php?action=administration';

        $articleManager -> updateArticle($id, $dp, $titre, $txt);
        header ("Location: $localisation");
    }

    public function modifierArticle($id) {
        $articleManager = new ArticleManager;

        $retour = $articleManager -> modifierArticle($id);
        return ($retour);

    }

}

?> 