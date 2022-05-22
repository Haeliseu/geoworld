<?php
include('header.php');

   if (!isset($_GET['idUser'])) {
      die("Parameter is missing!");
                                }
   $getid = intval($_SESSION['idUser']);
   $stmt = $pdo->prepare('SELECT * FROM user_data WHERE idUser = ?');
   $stmt->execute(array($getid));
   $userinfo = $stmt->fetchAll()  ;
   
      echo '
      <div align="center">
         <h2>Profil de '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>
         <br /><br />
         Prénom : '.$_SESSION['prenom'].'
         <br /> 
         Nom : '.$_SESSION['nom'].'
         <br />
         Mail : '.$_SESSION['identifiant'].'
         <br />  
         <a href="editionprofil.php">Editer mon profil</a>
         <br /> 
         <a href="deconnexion.php">Se déconnecter</a>
         <br />';
         echo'
      </div>';

      include("javascripts.php");
      include("footer.php");

?>