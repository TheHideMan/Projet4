<?php 
    print_r($_POST);
    if (isset($_POST['message'])) {
        $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false) {
        echo '<p>Votre email doit comporter un arobase. </p>';
    } else {
        $retour = mail('jeanforteroche@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['nom'], $_POST['prenom'], $_POST['email']);
        if ($retour) {
            echo '<p> Votre message a bien été envoyé. </p>';
        } else {
            echo '<p> Erreur.</p>';
        }
    }

}



?>