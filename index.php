<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
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

                <div class="row">
                    <input class="col-md-2 col-md-offset-5 id" type="text" name="nomcon" placeholder="Identifiant">
                </div>

                <div class="row">
                    <input class="col-md-2 col-md-offset-5 idid" type="password" name="m_passecon" placeholder="Mot de passe">
                </div>

                <div class="checkbox col-md-2 col-md-offset-5">
                    <label><input type="checkbox" value="">Se souvenir de moi</label>
                </div>
        
        
                <button class="col-md-2 col-md-offset-5" type="submit">Se connecter</button>

                <div class="col-md-2 col-md-offset-5 jeankevin">
                    <p>Pas encore de compte ? <a href="index_inscription.php">Inscrivez vous ici !</a></p>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
