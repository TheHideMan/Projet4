<?php $title = 'Projet 4 contact'; ?>
      
<?php ob_start(); ?>
       
    <h1 class="text-center">PAGE DE CONTACT </h1>
    
    <article class="container-fluid">
       <div class="row">
            <p class="col-12"> Vous pouvez nous contacter en utilisant le formulaire ci-dessous</p>
            <form class="col-12" action="\Projet4\index.php?action=envoie" method="post">
                <input type="text" name="nom" placeholder="Nom" autofocus required/>
                <input type="text" name="prenom" placeholder="Prenom" required/>
                <input type="email" name="email" placeholder="Email" required/> <br/><br/>
                <textarea name="message" placeholder="Laissez votre message ici" required> 

                </textarea><br/>
                <input type="submit" value="Envoyer"/><br/><br/>
            </form>
        </div>
        
    </article>
    
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>