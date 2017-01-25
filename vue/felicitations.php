<?php

require_once '../controleur/connexionDB.php';

echo "Félicitations, vous avez bien été enregistré. Pour vous connecter, veuiller rejoindre la page suivante !"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Document</title>
</head>
<body>

<!-- CONNEXION -->
<div class="container">
    <div class="row">
        <h2 class="col-md-12 centrer">Connexion</h2>
    </div>

    <div class="row">
        <form method="POST" action="controleur/login.php" class="conform">

            <a class="col-md-2 col-md-offset-5" type="submit" href="../index.php"> acceuil </a>


        </form>
    </div>
</div>

</body>
</html>

