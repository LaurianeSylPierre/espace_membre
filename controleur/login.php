<?php
    require_once 'connexionDB.php';

    if($membre->is_loggedin() != ""){
        $membre->redirect('accueil.php');
    }

    if(isset($_POST['maurice'])){
        $login = $_POST['login'];
        $m_passe = $_POST['m_passe'];

        if($membre->login($login, $m_passe)){
            $membre->redirect('accueil.php');
        }
        else{
            $erreur = "Mauvais login ou mot de passe";
        }
    }
?>
