<?php

include_once 'connexionDB.php';

$membre_login = $_SESSION['login_session'];
$stmt = $dbh->prepare("SELECT * FROM membre WHERE login = :login");
$stmt->execute(array(":login"=>$membre_login));
$membreRow=$stmt->fetch(PDO::FETCH_ASSOC);

$post = $_POST;
$comm = $_POST['comm'];

try{
    $stmt = $dbh->prepare("SELECT login FROM membre WHERE login=:login");
    $stmt->execute([':login'=>$membre_login]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if($row['login']==$membre_login){
        if($membre->modcomm($membre_login, $comm)){
            $membre->redirect('../vue/accueil.php');
        }
    }
}

catch (PDOException $e) {
    echo $e->getMessage();
}
?>
