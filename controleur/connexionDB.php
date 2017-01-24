<?php

session_start();

$user = 'mathieuc';
$pass = 'U9YDV9eNf5';

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=mathieuc', "mathieuc", "U9YDV9eNf5");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    catch(PDOException $e) {
        echo $e->getMessage();
    }

include_once 'class.user.php';
//Updated upstream;
$user = new USER($dbh);
$user = new USER($dbh);
// Stashed changes;
?>
