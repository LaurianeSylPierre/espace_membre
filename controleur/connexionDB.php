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
$membre = new MEMBRE($dbh);

$value = 'login';

setcookie("login", $value);
setcookie("login", $value, time()+3600);  /* expire dans 1 heure */
setcookie("login", $value, time()+3600, "/~rasmus/", "example.com", 1);

$value = 'm_passe';

setcookie("m_passe", $value);
setcookie("m_passe", $value, time()+3600);  /* expire dans 1 heure */
setcookie("m_passe", $value, time()+3600, "/~rasmus/", "example.com", 1);
?>
