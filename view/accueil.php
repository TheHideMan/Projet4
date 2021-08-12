<?php $title = 'Projet 4 accueil'; ?>
      
<?php ob_start(); ?>
    <title>Page d'accueil</title>  
    <h1 class="text-center h1">BIENVENUE SUR LE SITE DE JEAN FORTEROCHE !</h1>

    <article class="container-fluid" id="slideContainer">
        <div class="row" id="slider" tabindex="0">
            <div class="slide col-lg-12">
                <div class="numbertext">1 / 5</div>
                <img src='./public/images/diapo1.jpg' class="img-responsive col-lg-12 " alt="un champs de fleurs devant des montagnes enneigées"/>
                <div class="text">image alaska 1</div>
            </div>
            
            <div class="slide col-lg-12">
                <div class="numbertext">2 / 5</div>
                <img src='./public/images/diapo2.jpg' class="img-responsive col-lg-12 " alt="un paysage de montagne au printemps"/>
                <div class="text">image alaska 2</div>
            </div>
            
            <div class="slide col-lg-12">
                <div class="numbertext">3 / 5</div>
                <img src='./public/images/diapo3.jpg' class="img-responsive col-lg-12 " alt="une vallée avec un lac et une rivière entre des montagnes"/>
                <div class="text">image alaska 3</div>
            </div>
            
            <div class="slide col-lg-12">
                <div class="numbertext">4 / 5</div>
                <img src='./public/images/diapo6.jpg' class="img-responsive col-lg-12 " alt="une aurore boréale au dessus d'une forêt enneigée"/>
                <div class="text">image alaska 4</div>
            </div>
            
            <div class="slide col-lg-12">
                <div class="numbertext">5 / 5</div>
                <img src='./public/images/diapo5.jpg' class="img-responsive col-lg-12 " alt="un lac gelé devant des montagnes enneigées"/>
                <div class="text">image alaska 5</div>
            </div>
            
            <span class="prev">&#10094;</span> 
            <span class="next">&#10095;</span>
                
            
        </div>
        <input type="image" id="pause" src="/Projet4/public/images/logoPause.jpg" alt=" Pause">
        <input type="image" id="resume" src="/Projet4/public/images/logoPlay.png" alt=" Play">
    </article>
    
    <article class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12 col-lg-12 border">
                <h2>Retrouvez les derniers articles en date ici !</h2>
                <?php
                    $article_controller = new articleController;
                    $article_controller -> afficheArticle();
                ?>
            </div>
        </div>
    </article>
    
    <br/>
    <br/>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>