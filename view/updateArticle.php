<?php $title = 'Projet 4'; ?>
      
<?php ob_start(); ?>
       
    <h1 class="text-center">PAGE D' ECRITURE </h1>
       
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <?php
                    while($donnes = $reponse -> fetch()) {
                        
            ?>
                <form method="post" action="/Projet4/index.php?action=updateArticle">
                    <input type="hidden" name="id" value="<?php echo $donnes['id'] ?> "/>
                    <input type="text" name="titre" placeholder="Titre de l'article" value="<?php echo $donnes['titre'] ?>" required/> <br/><br/>
                    <input type="date" name="date" value="<?php echo $donnes['date_publication'] ?>" required /> <br/> <br/>
                    <textarea name="contenu" placeholder="texte de l'article" ><?php echo $donnes['contenu'] ?></textarea><br/>
                    <input type="submit" value="Modifier l'article" name="publier" /><br/><br/>
                </form>
            </div>
            
            <?php 
                }
            ?>


        </div>
    </div>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>