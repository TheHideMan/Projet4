<?php $title = 'Projet 4 articles'; ?>
      
<?php ob_start(); ?>
    <title>Page d'articles</title>
    <h1 class="text-center">PAGE D' ARTICLES </h1>
    <h2 class="text-center">Retrouvez tous les articles sur cette page !</h2>
    <img src='./public/images/article.jpg' class="img-responsive col-lg-12 " alt="page de journal" />
    
    <article class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                    while($donnes = $reponse -> fetch())  {
                ?>
                <p>
                    <strong><?php echo $donnes['date_publication']; ?></strong> : <a href="../Projet4/index.php?action=currentArticle&id=<?php echo $donnes['id'] ?>" > <?php echo $donnes['titre']; ?></a> <br/>
                    <?php echo $donnes['contenu']; ?>
                </p>
                <?php
                    }
                ?>
            </div>
            
        </div>
    </article>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

