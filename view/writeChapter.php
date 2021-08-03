<?php $title = 'Projet 4'; ?>
      
<?php ob_start(); ?>
       
    <h1 class="text-center">PAGE D' ECRITURE </h1>
    
    <article class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/Projet4/index.php?action=envoieChapitre">
                    <input type="text" name="titre" placeholder="Titre du chapitre" required/> <br/><br/>
                    <textarea name="contenu" placeholder="texte du chapitre" ></textarea><br/>
                    <input type="submit" value="Poster le chapitre" name="publier" /><br/><br/>
                </form>
            </div>

        </div>
    </article>
    
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>