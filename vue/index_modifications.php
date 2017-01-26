<?php
    include_once '../controleur/connexionDB.php';

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
    	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    	<link rel="stylesheet" type="text/css" href="../css/style.css" />
    	<title>Modification</title>
	</head>
	<body>
		<h2>Modifier votre profil</h2>
		<div class="container">
				<form method="POST" enctype="multipart/form-data"  action="../controleur/modif.php" class="formulaire">
					<div class="row">
							<label class="col-md-5 text-right">Identifiant :</label>
							<input types="text" class="col-md-3" name="login" value="<?php print($membreRow['login'])?>">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Mot de passe :</label>
							<input types="text" class="col-md-3" name="m_passe" required>
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Ressaisisez votre mot de passe :</label>
							<input types="text" class="col-md-3">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Nom :</label>
							<input types="text" class="col-md-3" name="nom" value="<?php print($membreRow['login'])?>">
					</div>
					<div class="row mt10">
							<label class="col-md-5 text-right">Prénom :</label>
							<input types="text" class="col-md-3" name="prenom" value="<?php print($membreRow['login'])?>">
					</div>

					<button class="btn btn-default col-md-offset-7 pourquoipas" type="submit">Envoyer</button>
				</form>
		</div>
	</body>
</html>
