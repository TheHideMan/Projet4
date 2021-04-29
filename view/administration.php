<?php $title = 'Projet 4'; ?>

<?php
    $back_controller = new BackController;
    $reponse = $back_controller -> afficheAllPost();
    $retour = $back_controller -> afficheReportedPost();
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

        <h2> Section édition</h2>
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