<?php $title = 'Projet 4 articles'; ?>
      
<?php ob_start(); ?>
    
    <h1 class="text-center">PAGE D' ARTICLES </h1>
    <h2 class="text-center">Retrouvez tous les articles sur cette page !</h2>
    <img src='./public/images/article.jpg' class="img-responsive col-lg-12 " alt="page de journal" />
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                    while($donnes = $reponse -> fetch())  {
                ?>
                <p>
                    <strong><?php echo $donnes['date_publication']; ?></strong> : <a href="../Projet4/index.php?action=currentArticle&titre=<?php echo $donnes['titre'] ?>" > <?php echo $donnes['titre']; ?></a> <br/>
                    <?php echo $donnes['contenu']; ?>
                </p>
                <?php
                    }
                ?>
            </div>
            
        </div>
    </div>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

