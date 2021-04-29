<?php
    session_start();
    
    require_once('controller/front_controller.php');
    require_once('controller/back_controller.php');
    $front_controller = new FrontController;
    $back_controller = new BackController;
    
    if (isset($_GET['action']))
        $page = $_GET['action'];
    else 
        $page = 'Accueil';

    switch ($page) {
            
        case 'articles': 
            $reponse = $front_controller -> afficheAllArticles();
            include('view/articles.php');
            break;
        case 'chapitres': 
            $reponse = $front_controller -> afficheAllChapters();
            include('view/chapitres.php');
            break;
        case 'contact':
            include ('view/contact.php');
            break;
        case 'envoie':
            $front_controller -> send();
            break;
        case 'connexion':
            $back_controller -> connexion();
            include('view/connexion.php');
            break;
        case 'deconnexion':
            $back_controller -> deconnexion();
            break;
        case 'administration':
            include('view/administration.php');
            break;
        case 'pageAdmin':
            include('view/administration.php');
            break;
        case 'currentArticle':
            $reponse = $front_controller -> afficheArticleDemande($_GET['titre']);
            $article = $reponse[0];
            $liste_comms = $reponse[1];
            include('view/currentArticle.php');
            break;
        case 'currentChapter':
            $reponse = $front_controller -> afficheChapitreDemande($_GET['id']);
            include('view/currentChapter.php');
            break;
        case 'writeChapter':
            include('view/writeChapter.php');
            break;
        case 'writeArticle':
            include('view/writeArticle.php');
            break;
        case 'envoieCommentaire':
            $front_controller -> sendPost($_GET['titre']);
            break;
        case 'delComms': 
            $back_controller -> delPost($_GET['id']);
            break;
        case 'signale':
            $back_controller -> signaler($_GET['id']);
            break;
        case 'envoieChapitre':
            $front_controller -> sendChapter();
            break;
        case 'envoieArticle':
            $front_controller -> sendArticle();
            break;
        default: 
            include('view/accueil.php');
    }
?>