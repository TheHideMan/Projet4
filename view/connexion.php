<?php 


    if(!isset($_SESSION['pseudo'])){
        ?>
        <div class="identification">
        <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target="#connexionContent" aria-expanded="false" > S'identifier </button>
        <form id="connexionContent" class="collapse" method="POST" action="\Projet4\index.php?action=connexion">
            <input type="text" name="user" placeholder="Utilisateur"/>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <input type="submit" name="connexion" value="Connexion"/>
        </form> 
    </div>

<?php
    } else {
        header('Location: /Projet4/index.php?action=pageAdmin');
    }

?>