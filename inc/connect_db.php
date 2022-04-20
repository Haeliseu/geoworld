<?php
Class Connexion {
private  $server = "mysql:host=localhost;dbname=world_db";
private  $user = "Administrateurs";
private  $pass = "YaminAris971-";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $con;
 
            public function Connexion()
             {
               try
                 {
          $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
          return $this->con;
                  }
               catch (PDOException $e)
                 {
                     echo "Erreur de connexion à la base de données: " . $e->getMessage();
                 }
             }
public function Deconnexion() {
     $this->con = null;
  }
}
?>