<?php
require_once '../controleur/connexionDB.php';

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <title>Recherche</title>
    </head>
    <body>
    <h1>Recherche</h1>
    <div class="container">
        <form method="POST" action="" class="formulaire">
            <h2>Qui recherchez vous ?</h2>
            <div class="row">
                <label class="col-md-5 text-right">Nom ou prenom :</label>
                <input types="text" class="col-md-3" name="search">
            </div>


            <button name="recherhce" class="btn btn-default col-md-offset-7 pourquoipas" type="submit">Recherche</button>
        </form>

<?php





if(isset($_POST["search"])){
    $member = $_POST["search"];

    $query = $dbh->query("SELECT membre.nom, membre.prenom, membre.login FROM membre WHERE nom LIKE '%$member%'");
    $result = $query->fetchAll();

    if (isset($_POST)){    foreach ($result as $lingne)
    {

        ?>

            <div class="row">
                <div class="col-md-3">
                    <a href="accueil.php?toto=<?php echo $lingne["nom"];?>" name="link"><?php echo $lingne["nom"];?></a>

                    <a href="accueil.php?toto=<?php echo $lingne["nom"];?>" name="link"><?php echo $lingne["prenom"];?></a>

                    <a href="accueil.php?toto=<?php echo $lingne["nom"];?>" name="link"><?php echo $lingne["login"];?></a>

                </div>
            </div>






    <?php } ?>
    <?php } ?>
        <?php } ?>



    </div>
    </body>
    </html>