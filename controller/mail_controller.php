<?php 
/*
require_once('model/user_manager.php');
require_once('model/post_manager.php');*/

class MailController {

    public function sendMail() {
        if (isset($_POST['message'])) {
            $position_arobase = strpos($_POST['email'], '@');
            if ($position_arobase === false) {
                echo '<p>Votre email doit comporter un arobase. </p>';
            } else {
                $retour = mail('jeanforteroche@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['nom'], $_POST['prenom']);
                if ($retour) {
                    echo '<p> Votre message a bien été envoyé. </p>';
                } else {
                    echo '<p> Erreur.</p>';
                }
            }
        }
    }

    

}

?> 