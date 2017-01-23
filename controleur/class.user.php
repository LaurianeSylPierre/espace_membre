<?php

//Ce fichier contient les fonctions (register, login, is_loggedin et redirect) qui permettent de maintenir les activités de l'utilisateur

    class USER {
        private $db;

        function __construct($dbh){
            $this->$db = $dbh;
        }

        //Pour s'enregistrer

        public function register($prenom, $nom, $login, $m_passe){
            try {
                $new_password = password_hash($m_passe, PASSWORD_DEFAULT);

       //stam = statement
                $stmt = $this->db->prepare("INSERT INTO membre (prenom, nom, login, m_passe)
                                                           VALUES(:prenom, :nom, :login, :m_passe)");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(":prenom", $prenom);
                $stmt->bindparam(":nom", $nom);
                $stmt->bindparam(":login", $login);
                $stmt->bindparam(":m_passe", $m_passe);
                $stmt->execute();

                return $stmt;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        //Pour se connecter

        public function login($login, $m_passe){
            try{
                $stmt = $this->db->prepare("SELECT * FROM membre WHERE login=:login LIMIT 1");
                $stmt->execute(array(':login=>'$login));
                $membreRow=$stmt->fetch(PDO::FETCH_ASSOC); //permet la récupération de l'array

                if($stmt->rowCOUNT() > 0){ //Si l'utilisateur entre des données
                    if(password_verify($m_passe, $membreRow['m_passe'])){
                        $_SESSION['login_session'] = $membreRow['id_membre'];
                    }
                    else{
                        return false;
                    }
                }
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        //Pour quand t'es connecté

        public function is_loggedin(){
            if(isset($_SESSION['login_session'])){
                return true;
            }
        }

        //Pour si tu foires ta connexion

        public function redirect($url){
            header("Location: $url");
        }

        //Pour se déconnecter

        public function logout(){
            session_destroy();
            unset($_SESSION['login_session']);
            return true;
        }
    }
?>
