<?php
session_start();
 
include('inc/connect_db.php');
 
if(isset($_POST['formconnexion'])) {
   $mail = htmlspecialchars($_POST['identifiant']);
   $password = sha1($_POST['mot_de_passe']);
   if(!empty($mail) AND !empty($password)) {
      $requser = $bdd->prepare("SELECT * FROM user_data WHERE identifiant = ? AND mot_de_passe = ?");
      $requser->execute(array($mail, $password));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['idUser'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['identifiant'] = $userinfo['identifiant'];
         header("Location: profil.php?id=".$_SESSION['idUser']);
      } else {
         $erreur = "Mail ou mot de passe incorrect !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="identifiant" placeholder="Identifiant" />
            <input type="password" name="password" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>