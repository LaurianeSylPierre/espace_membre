<?php

require_once 'connexionDB.php';

if($membre->is_loggedin() != ""){
    $membre->redirect('accueil.php');
}

if(isset($_POST['pourquoipas'])){
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $login = trim($_POST['login']);
    $m_passe = trim($_POST['m_passe']);
    $img = trim($_POST['img']);

    if($prenom==""){
        $error[] = "Entrez un prénom";
    }
    else if($nom==""){
        $error[] = "Entrez un nom";
    }
    else if($login==""){
        $error[] = "Entrez un login";
    }
    else if(strlen($m_passe) < 6){
        $error[] = "Entrez un mot de passe";
    }
    else{
        try{
            $stmt = $dbh->prepare("SELECT login FROM membre WHERE login=:login");
            $stmt->execute(array(':login'=>$login));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['login']==$login){
                $error = "Désolé, ce login est déjà pris";
            }
            else{
                if($membre->register($prenom,$nom,$login,$m_passe,$img)){
                    $membre->redirect('accueil.php')
                }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>


<!-- //Et on récupère les données
    $form = $_POST;
    $id_membre = '';
    $nom = $form[ 'nom' ];
    $prenom = $form[ 'prenom' ];
    $m_passe = $form[ 'm_passe' ];
    $img = $form[ 'img' ];

//On les insère dans le tableau
    $register = "INSERT INTO membre (id_membre, nom, prenom, m_passe, img) VALUES (:id_membre, :nom, :prenom, :m_passe, :img)";

//On les prépare
    $query = $dbh->prepare( $register );
// On les exécute
    $query->execute( array( ':id_membre'=>$id_membre, ':nom'=>$nom, ':prenom'=>$prenom, ':login'=>$login, ':m_passe'=>$m_passe, ':mail'=>$mail ) );


    header('Location: ../index.php');
    exit(); -->
