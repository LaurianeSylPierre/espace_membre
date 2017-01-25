<?php

require_once 'connexionDB.php';

$post = $_POST;
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$login = $_POST['login'];
$m_passe = $_POST['m_passe'];
$img = $_FILES['file']['name'];



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
else if($img!="") {
    require_once 'imgverif.php';
    verifimg();
}

if (!isset($error)) {
    try{
        $stmt = $dbh->prepare("SELECT login FROM membre WHERE login=:login");
        $stmt->execute([':login'=>$login]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        if($row['login']==$login){
            $error = "Désolé, ce login est déjà pris";
        }
        else{

            if($membre->register($prenom,$nom,$login,$m_passe,$chem)){
                $membre->redirect('../accueil.php');
            }
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}


