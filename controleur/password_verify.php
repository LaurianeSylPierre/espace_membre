<?php
//Updated upstream

//Vérifie le mot de passe et retourne une boolean (donc s'il est vrai ou faux, s'il est vrai il retourne true)


//Stashed changes
    $password = "RECUPERATION MDP";
    $hashed_password = '$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa';
    password_verify($password, $hashed_password);
?>
