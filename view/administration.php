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
            <div class="col-12 adminMenu">
                <a href="#comms" style="margin-right: 5%;">Commentaires</a>
                <a href="#articles">Articles</a>
                <a href="#chapitres">Chapitres</a>
                <a href="#edition">Edition</a>
            </div>
        </div>
        <br/>
        <br/>
        <article class="row">
            <div class="col-sm-12 col-lg-6 ">
            <h2 id='comms'>Section commentaire</h2>
                <?php
                    while($donnes = $reponse -> fetch()) {
                ?>

                <div class="border rounded">
                    <strong>Article <?php echo $donnes['titre']; ?> -</strong> <?php echo $donnes['cal']; ?> : <?php echo $donnes['pseudo']; ?> <br/>
                    <?php echo html_entity_decode($donnes['contenu']); ?>
                    <a href="\Projet4\index.php?action=delComms&id=<?php echo $donnes['id_post'] ?>">Supprimer le commentaire </a> 
                </div>
                <br/>

                <?php 
                    }
                ?>

                
            </div>
            <div class="col-sm-12 col-lg-6">
                <h2>Commentaires signalés</h2>
                <?php
                    while($data = $retour -> fetch()) {
                ?>
                
                <div class="border rounded" style="background-color:red">
                    <strong>Article<?php echo $data['id_article']; ?> -</strong> <?php echo $data['cal']; ?> : <?php echo $data['pseudo']; ?> <br/>
                    <?php echo html_entity_decode($data['contenu']); ?> 
                    <a href="\Projet4\index.php?action=delComms&id=<?php echo $data['id_post'] ?>">Supprimer le commentaire </a>
                    </div>

                <?php 
                    }
                ?>
                   
            </div>
        </article>
        
        <h2 class="text-center" id="articles">Section articles</h2>
        <article class="row">
            <div class="col-12">
                <?php 
                    while($donnes = $articles -> fetch()) { 
                ?>
                <p>
                    <strong><?php echo $donnes['date_publication']; ?></strong> :<?php echo $donnes['titre'] ?>" <br/>
                    <?php echo $donnes['contenu']; ?>

                    <a href="\Projet4\index.php?action=upArticle&id= <?php echo $donnes['id']?>">Modifier l'article</a>
                    <div><a href="\Projet4\index.php?action=delArticle&id=<?php echo $donnes['id'] ?>">Supprimer l'article</a></div>
                </p>

                <?php 
                    }
                ?>
            </div>
        </article>

        <h2 class="text-center" id="chapitres">Section chapitres</h2>
        <article class="row">
            <div class="col-12">
                <?php 
                    while($donnes = $chapters -> fetch()) { 
                ?>
                <p>
                <strong><?php echo $donnes['titre']; ?> </strong><br/>
                    
                        <?php echo html_entity_decode($donnes['manu']); ?> 
                    
                    <a href="\Projet4\index.php?action=upChapter&id= <?php echo $donnes['id']?>">Modifier le chapitre</a>
                    <div><a href="\Projet4\index.php?action=delChapter&id=<?php echo $donnes['id'] ?>">Supprimer le chapitre</a></div>
                </p>

                <?php 
                    }
                ?>
            </div>
        </article>

        <h2 class="text-center" id="edition"> Section édition</h2>
        <aside class="row">
            <div class="col-6 text-center">
                <a href="\Projet4\index.php?action=writeChapter" class="adminButton" > Rédiger un chapitre </a>
            </div>
            <div class="col-6 text-center">
                <a href="\Projet4\index.php?action=writeArticle" class="adminButton" > Rédiger un article </a>
            </div>
        </aside>

        
        

    </div>

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>