<?php

$user = 'mathieuc';
$pass = 'U9YDV9eNf5';

try {
  $dbh = new PDO('mysql:host=localhost;dbname=mathieuc', "mathieuc", "U9YDV9eNf5");
 } catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
 }

catch(PDOException $e) {
    echo $e->getMessage();
}

//Et on récupère les données
    $form = $_POST;
    $id_membre = '';
    $nom = $form[ 'nom' ];
    $prenom = $form[ 'prenom' ];
    $m_passe = $form[ 'm_passe' ];
    $img = $form[ 'img' ];

//On les insère dans le tableau
    $register = "INSERT INTO membre (id_membre, nom, prenom, m_passe, img) VALUES (:id_membre, :nom, :prenom, :m_passe, :img)";

//On les prépare
    $query = $dbh->prepare( $register );
// On les exécute
    $query->execute( array( ':id_membre'=>$id_membre, ':nom'=>$nom, ':prenom'=>$prenom, ':login'=>$login, ':m_passe'=>$m_passe, ':mail'=>$mail ) );


    header('Location: ../index.php');
    exit();?>
