<?php
    require_once 'connexionDB.php';

    if($membre->is_loggedin() != ""){
        $membre->redirect('accueil.php');
    }

    $login = $_POST['login'];
    $m_passe = $_POST['m_passe'];

    if($membre->login($login, $m_passe)){

       $membre->redirect('controleur/accueil.php');
    }
    else{
        echo "Mauvais login ou mot de passe";
    }
?>
