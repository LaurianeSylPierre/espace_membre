<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    	<link rel="stylesheet" type="text/css" href="css/style.css" />
    	<title>Inscription</title>
	</head>
	<body>
		<h1>Inscription</h1>
		<div class="container">
				<form method="POST" enctype="multipart/form-data"  action="controleur/register.php" class="formulaire">
					<div class="row">
							<label class="col-md-5 text-right">Identifiant :</label>
							<input types="text" class="col-md-3" name="login">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Mot de passe :</label>
							<input types="text" class="col-md-3" name="m_passe">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Ressaisisez votre mot de passe :</label>
							<input types="text" class="col-md-3">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Nom :</label>
							<input types="text" class="col-md-3" name="nom">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Prénom :</label>
							<input types="text" class="col-md-3" name="prenom">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Images :</label>
                        <input type="hidden" name="filesize" value="150000" />
                        <input type="file" name="file" />
					</div>

					<button class="btn btn-default col-md-offset-7 pourquoipas" type="submit">Envoyer</button>
				</form>
		</div>
	</body>
</html>