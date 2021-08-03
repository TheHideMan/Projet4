<?php $title = 'Projet 4'; ?>
      
<?php ob_start(); ?>
       
    <h1 class="text-center">PAGE D' ECRITURE </h1>
       
    <article class="container-fluid">
        <div class="row">
            <div class="col-12">
            <?php
                    while($donnes = $reponse -> fetch()) {
                        
            ?>
                <form method="post" action="/Projet4/index.php?action=updateChapter">
                    <input type="hidden" name="id" value="<?php echo $donnes['id'] ?> "/>
                    <input type="text" name="titre" placeholder="Titre du chapitre" value="<?php echo $donnes['titre'] ?>" required/> <br/><br/>
                    <textarea name="manu" placeholder="texte du chapitre" ><?php echo $donnes['manu'] ?></textarea><br/>
                    <input type="submit" value="Modifier le chapitre" name="publier" /><br/><br/>
                </form>
            </div>
            
            <?php 
                }
            ?>


        </div>
    </article>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>