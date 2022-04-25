<?php
include('header.php');
 
include('inc/connect_db.php');
 
if(isset($_GET['idUser']) AND $_GET['idUser'] > 0) {
   $getid = intval($_GET['idUser']);
   $stmt = $pdo->prepare('SELECT * FROM user_data WHERE idUser = ?');
   $stmt->execute(array($getid));
   //$userinfo = $stmt->fetchAll();
   while($userinfo = $stmt->fetch(PDO::FETCH_ASSOC)) :

   echo '<p>nsnsnznzenb</p>
   <div align="center">
      <h2>Profil de '.$userinfo['prenom'].', ' .$userinfo['nom'].'</h2>
      <br /><br />
      Prénom = '.$userinfo['prenom'].'
      <br /> 
      Nom = '.$userinfo['nom'].'
      <br />
      Mail = '.$userinfo['identifiant'].'
      <br />';
      if(isset($_SESSION['idUser']) AND $userinfo['idUser'] == $_SESSION['idUser']) {
      echo '      <!-- <a href="editionprofil.php">Editer mon profil</a> -->
      <a href="deconnexion.php">Se déconnecter</a>
      <br />
      ';
      };
      echo'
   </div>';


   
endwhile;
}
      include("javascripts.php");
      include("footer.php");

?>