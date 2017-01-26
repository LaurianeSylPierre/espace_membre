<?php

//Ce fichier contient les fonctions (register, login, is_loggedin et redirect) qui permettent de maintenir les activités de l'utilisateur

    class MEMBRE {
        private $db;

        function __construct($dbh){
            $this->db = $dbh;
        }

        //Pour s'enregistrer

        public function register($prenom, $nom, $login, $m_passe, $chem){
            try {
                $new_password = password_hash($m_passe, PASSWORD_BCRYPT);

       //stam = statement
                $stmt = $this->db->prepare("INSERT INTO membre (prenom, nom, login, m_passe, img)
                                            VALUES(:prenom, :nom, :login, :m_passe, :img)");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(":prenom", $prenom);
                $stmt->bindparam(":nom", $nom);
                $stmt->bindparam(":login", $login);
                $stmt->bindparam(":m_passe", $new_password);
                $stmt->bindparam(":img",$chem);
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
                $stmt->execute(array(':login'=>$login));
                $membreRow=$stmt->fetch(PDO::FETCH_ASSOC); //permet la récupération de l'array

                if($stmt->rowCount() > 0){ //Si l'utilisateur entre des données
                    if(password_verify($m_passe, $membreRow['m_passe'])){
                        $_SESSION['login_session'] = $membreRow['login'];
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

        //Pour si tu veux modifier ton profil

        public function modify($id_membre, $prenom, $nom, $login, $m_passe){
            try {
                $new_password = password_hash($m_passe, PASSWORD_BCRYPT);
       //stam = statement
                $stmt = $this->db->prepare("UPDATE membre
                    SET id_membre=:id_membre, nom=:nom,prenom=:prenom,login=:login,m_passe=:m_passe
                    WHERE login=:login_session");

                  //bindparam va relier les valeurs aux fonctions des valeurs
                $stmt->bindparam(":login_session", $_SESSION['login_session']);
                $stmt->bindparam(":id_membre", $id_membre);
                $stmt->bindparam(":prenom", $prenom);
                $stmt->bindparam(":nom", $nom);
                $stmt->bindparam(":login", $login);
                $stmt->bindparam(":m_passe", $new_password);
                $stmt->execute();

                return $stmt;
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        //Pour laisser des infos supplémentaires sur son profil

        public function commentary($membre_login, $comm){
            try{
                $stmt= $this->db->prepare("INSERT INTO commentaire_utilisateur (login_uti, comm_uti)
                VALUES (:login_uti, :comm_uti)");

                $stmt->bindparam(':login_uti', $membre_login);
                $stmt->bindparam(':comm_uti', $comm);
                $stmt->execute();
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        //Pour se déconnecter

        public function logout(){
            session_destroy();
            unset($_SESSION['login_session']);
            return true;
        }
    }
?>
