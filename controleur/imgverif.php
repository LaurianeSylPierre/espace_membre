<?php

function verifimg(){

    $maxsize = 20000;


    $_FILES['file']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_file.png).
    $_FILES['file']['type'] ;    //Le type du fichier. Par exemple, cela peut être « image/png ».
    $_FILES['file']['size']  ;   //La taille du fichier en octets.
    $_FILES['file']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $_FILES['file']['error']  ;  //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    if ($_FILES['file']['error'] > 0) $erreur = "Erreur lors du transfert";
    if ($_FILES['file']['size'] > $maxsize) $erreur = "Fichier trop volumineux";
    $extensions_valide = array( 'gif' , 'jpg' );
    $extensions_nonvalide = array( 'jpeg' , 'png' );

//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.

    $extension_upload = strtolower(  substr(  strrchr($_FILES['file']['name'], '.')  ,1)  );
    if ( in_array($extension_upload,$extensions_valide) ) echo "Extension correcte";

    elseif (in_array($extension_upload,$extensions_nonvalide) ) echo "Pas de jpeg ni de png merci";
}


//Créer un identifiant difficile à deviner
$fichier = md5(uniqid(rand(), true)).$_FILES['file']['name'];

$nom = "../img/".$fichier;
$resultat = move_uploaded_file($_FILES['file']['tmp_name'],$nom);
if ($resultat) echo "Transfert réussi";

// On insere les donnÃ©es dans le tableau
$add_comm = "INSERT INTO membre (img) VALUES (:img)";

// On prepare l'insertion
$query = $dbh->prepare( $add_comm );
// On exÃ©cute l'insertion
$query->execute( array( ':img'=>$fichier ) );

