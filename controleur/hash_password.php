<?php

//Permet de protéger le mot de passe, la fonction hash spécifie l'algorithme utilisé

$password = "[Fonction d'appel de mdp]";
$hash = password_hash($password, PASSWORD_DEFAULT);
$hashed_password = "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";

?>
