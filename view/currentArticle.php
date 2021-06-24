<?php $title = 'Projet 4 article'; ?>

<?php ob_start(); ?>
    
    <h1 class="text-center">VOIR ARTICLE </h1>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                    while($donnes = $article -> fetch()) {
                        
                ?>
                <p>
                    <strong><?php echo $donnes['date_publication']; ?></strong> : <?php echo $donnes['titre']; ?> <br/>
                    <?php echo $donnes['contenu']; ?>
                </p>
                <?php
                   
                   
                    }
                ?>
            </div> 
        </div>

        <div class="row">
            <div class="col-12" >
                <h2 class="text-center">SECTION COMMENTAIRE</h2>
                <form method="post" action="/Projet4/index.php?action=envoieCommentaire&titre=<?php echo $_GET['titre'] ?>" >
                    <input type="text" name="pseudo" placeholder="Votre pseudo" required/> <br/><br/>
                    <textarea name="commentaire" placeholder="Votre commentaire" ></textarea><br/>
                    <input type="submit" value="Poster le commentaire" name="poster" /><br/><br/>
                </form>

                
                <div class="col-12">
                    <?php 
                        
                        while($liste = $liste_comms -> fetch()){
                    ?>
                        <p class="border">
                            <?php echo $liste['cal']; ?>, <strong><?php echo $liste['pseudo']; ?> </strong><br/>
                            <?php echo html_entity_decode($liste['contenu']); ?>
                        </p>
                        <a href="/Projet4/index.php?action=signale&id=<?php echo $liste['id_post'] ?>" class="border"> Signaler </a>
                    <?php
                        }
                    ?>
                </div>

            </div>
        </div>

    </div>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>