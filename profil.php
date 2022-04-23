<?php
session_start();
 
include('inc/connect_db.php');
 
if(isset($_GET['idUser']) AND $_GET['idUser'] > 0) {
   $getid = intval($_GET['idUser']);
   $requser = $bdd->prepare('SELECT * FROM user_data WHERE idUser = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['prenom'], $userinfo['nom']; ?></h2>
         <br /><br />
         Prénom = <?php echo $userinfo['prenom']; ?>
         <br /> 
         Nom = <?php echo $userinfo['nom']; ?>
         <br />
         Mail = <?php echo $userinfo['identifiant']; ?>
         <br />
         <?php
         if(isset($_SESSION['idUser']) AND $userinfo['idUser'] == $_SESSION['idUser']) {
         ?>
         <br />
         <!-- <a href="editionprofil.php">Editer mon profil</a> -->
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>