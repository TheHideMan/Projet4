<!------------------------------------------------------------------>
<!------------------------- MENU ----------------------------------->
<!------------------------------------------------------------------>

<nav class="navbar navbar-expand-lg bg-dark">
    <button type="button" class="navbar-toggler btn-outline-primary btn-lg" data-toggle="collapse" data-target="#navbarContent" aria-expanded="true"> MENU </button>

    <ul id="navbarContent" class="navbar-nav show" >
        <li class="nav-item-active"><a class="nav-link" href="/Projet4/index.php"> Page d'accueil </a></li>
        <li class="nav-item"><a class="nav-link" href="/Projet4/index.php?action=articles"> Articles </a></li>
        <li class="nav-item"><a class="nav-link" href="/Projet4/index.php?action=chapitres" > Chapitres </a></li>
        <li class="nav-item"><a class="nav-link" href="/Projet4/index.php?action=contact" > Contact </a></li>
        <?php 
            if(isset($_SESSION['pseudo'])) {
        ?>
            <li class="nav-item"><a class="nav-link" href="/Projet4/index.php?action=administration" > Admin </a></li>
            <li class="nav-item"><a class="nav-link deco" href="/Projet4/index.php?action=deconnexion" style='display: block;'> Déconnexion </a></li>
        <?php 
            } else {
        ?>
            <li class="nav-item"> 
                <div style='display: inline'>
                    <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target="#connexionContent" aria-expanded="false" > S'identifier </button>
                    <form id="connexionContent" class="collapse" method="POST" action="\Projet4\index.php?action=connexion">
                        <input type="text" name="user" placeholder="Utilisateur"/>
                        <input type="password" name="password" placeholder="Mot de passe"/>
                        <input type="submit" name="connexion" value="Connexion"/>
                    </form> 
                </div>
            </li>
        <?php
            }
        ?>
        <li class="nav-item"> 
                <div style='display: none'>
                    <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target="#inscriptionContent" aria-expanded="false" > S'inscrire </button>
                    <form id="inscriptionContent" class="collapse" method="POST" action="\Projet4\index.php?action=inscription">
                        <input type="text" name="user" placeholder="Utilisateur"/>
                        <input type="password" name="password" placeholder="Mot de passe"/>
                        <input type="submit" name="inscription" value="Inscription"/>
                    </form> 
                </div>
            </li>
    </ul> 
</nav>