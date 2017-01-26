<?php
    include_once '../controleur/connexionDB.php';

    $url='http://mathieuc.marmier.codeur.online/add_member/';

    if(!$membre->is_loggedin()){
        $membre->redirect('../controleur/index.php');
    }

    $membre_login = $_SESSION['login_session'];

    $stmt = $dbh->prepare("SELECT * FROM membre WHERE login = :login");
    $stmt->execute(array(":login"=>$membre_login));
    $membreRow=$stmt->fetch(PDO::FETCH_ASSOC);

    $stmt2 = $dbh->prepare("SELECT comm_uti FROM commentaire_utilisateur WHERE login_uti = :login_uti");
    $stmt2->execute(array(":login_uti"=>$membre_login));
    $commRow=$stmt2->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Espace Membre</title>
</head>
<body>
<div class="container">
    <div class="container accueil">
        <header class="row">
            <div class="col-md-12 bienvenue">Bienvenue <?php print($membreRow['login']);?></div>
            <div class="col-md-12 recherche"><a href="search.php">recherche</a></div>
        </header>
        <main class="row">
            <div class="row">
                <div class="col-md-4 zoneimg">
                    <div class="imguser"><img src="<?php print($url.$membreRow['img']);?>" alt="votre avatar"></div>
                    <div class="changerimg"><a href="img.php" class="btn btn-primary">Changer votre avatar</a></div>
                </div>
                <div class="col-md-8 contour">
                    <div class="categories">Nom : </div>
                    <div class="informations"><?php print($membreRow['nom']);?></div>
                    <div class="categories">Prénom : </div>
                    <div class="informations"><?php print($membreRow['prenom']);?></div>
                    <div class="categories">Login : </div>
                    <div class="informations"><?php print($membreRow['login']);?></div>

                    <a href="index_modifications.php" class="modifier">Modifier votre profil</a>
                </div>
            </div>
            <div class="row">
                <h3>Mettez des informations sur vous !</h3>
                <div class="commentaire"><?php print($commRow['comm_uti']);?></div>
                <a href="commentaire.php">Cliquez ici pour modifier vos informations complémentaires</a>
            </div>
        </main>
        <footer></footer>
    </div>
    <footer></footer>
</div>
</body>
</html>
