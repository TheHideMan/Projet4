<?php $title = 'Projet 4'; ?>
      
<?php ob_start(); ?>

    <title>Ecriture d'article</title>
       
    <h1 class="text-center">PAGE D' ECRITURE </h1>
    
       
    <article class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/Projet4/index.php?action=envoieArticle">
                    <input type="text" name="titre" placeholder="Titre de l'article" required/> <br/><br/>
                    <input type="date" name="date" required /> <br/> <br/>
                    <textarea name="contenu" placeholder="texte de l'article" ></textarea><br/>
                    <input type="submit" value="Poster l'article" name="publier" /><br/><br/>
                </form>
            </div>

        </div>
    </article>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>