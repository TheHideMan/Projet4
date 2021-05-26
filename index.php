<?php
    session_start();
    
    require_once('controller/user_controller.php');
    require_once('controller/article_controller.php');
    require_once('controller/chapter_controller.php');
    require_once('controller/mail_controller.php');
    require_once('controller/post_controller.php');
    
    $user_controller = new UserController;
    $article_controller = new ArticleController;
    $chapter_controller = new ChapterController;
    $mail_controller = new MailController;
    $post_controller = new PostController;
    
    if (isset($_GET['action']))
        $page = $_GET['action'];
    else 
        $page = 'Accueil';

    switch ($page) {
            
        case 'articles': 
            $reponse = $article_controller -> afficheAllArticles();
            include('view/articles.php');
            break;
        case 'chapitres': 
            $reponse = $chapter_controller -> afficheAllChapters();
            include('view/chapitres.php');
            break;
        case 'contact':
            include ('view/contact.php');
            break;
        case 'envoie':
            $mail_controller -> sendMail();
            break;
        case 'connexion':
            $user_controller -> connexion();
            break;
        case 'deconnexion':
            $user_controller -> deconnexion();
            break;
        case 'administration':
            include('view/administration.php');
            break;
        case 'currentArticle':
            $reponse = $article_controller -> afficheArticleDemande($_GET['titre']);
            $article = $reponse[0];
            $liste_comms = $reponse[1];
            include('view/currentArticle.php');
            break;
        case 'currentChapter':
            $reponse = $chapter_controller -> afficheChapterDemande($_GET['id']);
            include('view/currentChapter.php');
            break;
        case 'writeChapter':
            include('view/writeChapter.php');
            break;
        case 'writeArticle':
            include('view/writeArticle.php');
            break;
        case 'envoieCommentaire':
            $post_controller -> sendPost($_GET['titre']);
            break;
        case 'delComms': 
            $post_controller -> delPost($_GET['id']);
            break;
        case 'signale':
            $post_controller -> signaler($_GET['id']);
            break;
        case 'envoieChapitre':
            $chapter_controller -> sendChapter();
            break;
        case 'envoieArticle':
            $article_controller -> sendArticle();
            break;
        default: 
            include('view/accueil.php');
    }
?>