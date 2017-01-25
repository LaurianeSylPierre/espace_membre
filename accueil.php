<?php
    include_once 'controleur/connexionDB.php';

    $membre_login = $_SESSION['login_session'];
    $stmt = $dbh->prepare("SELECT * FROM membre WHERE login = :login");
    $stmt->execute(array(":login"=>$membre_login));
    $membreRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace Membre</title>
</head>
<body>
<div class="container">
    <header>
        <div class="bienvenue">Bienvenue <?php print($membreRow['login']);?></div>
    </header>
    <main>
        <div class="imguser"><img src="" alt=""></div>
        <div class="changerimg"><button></button></div>
        <div class="contour">
            <div class="categories">Nom : </div>
            <div class="informations"><?php print($membreRow['nom']);?></div>
            <div class="categories">Prénom : </div>
            <div class="informations"><?php print($membreRow['prenom']);?></div>
            <div class="categories">Login : </div>
            <div class="informations"><?php print($membreRow['login']);?></div>
            <div class="categories">Mot de Passe</div>
            <div class="informations"><?php print($membreRow['m_passe']);?></div>
        </div>
    </main>
    <footer></footer>
</div>
</body>
</html>
