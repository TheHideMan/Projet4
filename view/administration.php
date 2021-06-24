<?php $title = 'Projet 4 page admin'; ?>

<?php
    $post_controller = new PostController;
    $article_controller = new ArticleController;
    $chapter_controller = new ChapterController;

    $reponse = $post_controller -> afficheAllPost();
    $retour = $post_controller -> afficheReportedPost();
    $articles = $article_controller -> afficheAllArticles();
    $chapters = $chapter_controller -> afficheAllChapters();
?>
      
<?php ob_start(); ?>
       
    <h1 class="text-center">PAGE D'ADMINISTRATION </h1>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12 col-lg-6 ">
            <h2>Section commentaire</h2>
                <?php
                    while($donnes = $reponse -> fetch()) {
                ?>

                <p class="border rounded">
                    <strong><?php echo $donnes['article_commenté']; ?></strong> <?php echo $donnes['cal']; ?> : <?php echo $donnes['pseudo']; ?> <br/>
                    <?php echo html_entity_decode($donnes['contenu']); ?> <br/>
                    <a href="\Projet4\index.php?action=delComms&id=<?php echo $donnes['id_post'] ?>">Supprimer le commentaire </a>
                </p>

                <?php 
                    }
                ?>

                
            </div>
            <div class="col-sm-12 col-lg-6">
                <h2>Commentaires signalés</h2>
                <?php
                    while($data = $retour -> fetch()) {
                ?>
                
                <p class="border rounded" style="background-color:red">
                    <strong><?php echo $data['article_commenté']; ?></strong> <?php echo $data['cal']; ?> : <?php echo $data['pseudo']; ?> <br/>
                    <?php echo html_entity_decode($data['contenu']); ?> <br/>
                    <a href="\Projet4\index.php?action=delComms&id=<?php echo $data['id_post'] ?>">Supprimer le commentaire </a>
                </p>

                <?php 
                    }
                ?>
                   
            </div>
        </div>

        <h2 class="text-center">Section articles</h2>
        <div class="row">
            <div class="col-12">
                <?php 
                    while($donnes = $articles -> fetch()) { 
                ?>
                <p>
                    <strong><?php echo $donnes['date_publication']; ?></strong> :<?php echo $donnes['titre'] ?>" > <?php echo $donnes['titre']; ?> <br/>
                    <?php echo $donnes['contenu']; ?>

                    <a href="\Projet4\index.php?action=updateArticle">Modifier l'article</a>
                    <div><a href="\Projet4\index.php?action=delArticle">Supprimer l'article</a></div>
                </p>

                <?php 
                    }
                ?>
            </div>
        </div>

        <h2 class="text-center">Section chapitres</h2>
        <div class="row">
            <div class="col-12">
                <?php 
                    while($donnes = $chapters -> fetch()) { 
                ?>
                <p>
                <strong><?php echo $donnes['titre']; ?> </strong><br/>
                    
                        <?php echo html_entity_decode($donnes['manu']); ?> 
                    
                    <a href="\Projet4\index.php?action=updateChapter">Modifier le chapitre</a>
                    <div><a href="\Projet4\index.php?action=delChapter">Supprimer le chapitre</a></div>
                </p>

                <?php 
                    }
                ?>
            </div>
        </div>

        <h2 class="text-center"> Section édition</h2>
        <div class="row">
            <div class="col-6 text-center">
                <a href="\Projet4\index.php?action=writeChapter" class="adminButton" > Rédiger un chapitre </a>
            </div>
            <div class="col-6 text-center">
                <a href="\Projet4\index.php?action=writeArticle" class="adminButton" > Rédiger un article </a>
            </div>
        </div>

        
        

    </div>

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>