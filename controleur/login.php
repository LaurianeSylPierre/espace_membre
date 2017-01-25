<?php
    require_once 'connexionDB.php';

    if($membre->is_loggedin() != ""){
        $membre->redirect('accueil.php');
    }

/*    if(isset($_POST['maurice'])){*/

        $login = $_POST['login'];
        $m_passe = trim($_POST['m_passe']);
        $new_m_passe = password_hash($m_passe, PASSWORD_DEFAULT);

        if($membre->login($login, $new_m_passe)){

           $membre->redirect('controleur/accueil.php');
        }
        else{
            print_r($new_m_passe);
            echo "Mauvais login ou mot de passe";
        }
   /* }*/
?>
