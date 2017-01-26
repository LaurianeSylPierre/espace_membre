<?php
    include_once '../controleur/connexionDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Commentaire du profil</title>
</head>
<body class="container">
    <div class="row">
        <h3>Remplissez le champ avec les informations complémentaires que vous voulez donner :</h3>
        <form method="POST" action="../controleur/modif_comm.php">
            <textarea class="form-control" rows="10" name="comm"></textarea>
            <button class="btn btn-default col-md-offset-10" name="ajoutcomm" type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>
