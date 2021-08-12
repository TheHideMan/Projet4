<?php $title = 'Projet 4 chapitres'; ?>
      
<?php ob_start(); ?>
    <title>page de chapitres</title>
    <h1 class="text-center">PAGE DE CHAPITRES </h1>
    <h2 class="text-center">Vous retrouverez sur cette page tous les chapitres du nouveau roman de Jean Forteroche : "Billet simple pour l'Alaska"</h2>
    <img src='./public/images/livre3.jpg' class="img-responsive col-lg-12 " alt="une tranche de livre" />

    <article class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                    while($donnes = $reponse -> fetch())  {
                ?>
                <p>
                    
                    <strong> <a href="../Projet4/index.php?action=currentChapter&id=<?php echo $donnes['id']; ?>" > <?php echo $donnes['titre']; ?> </a></strong><br/>
                    <div>
                        <?php echo html_entity_decode($donnes['manu']); ?> 
                    </div>
                    
                </p>
                <?php
                    }
                ?>
            </div>
            
        </div>
    </article>
    



    
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

        