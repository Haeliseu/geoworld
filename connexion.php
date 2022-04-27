<?php

 include('header.php');
include('inc/connect_db.php');
 
if(isset($_POST['formconnexion'])) {
   $mail = htmlspecialchars($_POST['identifiant']);
   $password = $_POST['password'];
   if(!empty($mail) AND !empty($password)) {
      $stmt = $pdo->prepare("SELECT * FROM `user_data` WHERE `identifiant` = :identifiant AND `mot_de_passe` = SHA1(:pass)");
      $stmt->bindParam('identifiant', $mail, PDO::PARAM_STR);
      $stmt->bindParam('pass', $password, PDO::PARAM_STR);
      $stmt->execute();
      $userexist = $stmt->rowCount();
      if($userexist == 1) {
         $userinfo = $stmt->fetch();
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
 <div class="container">
 <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="card" style="width: auto; box-shadow: 10px 5px 5px gray;">
            <img src="media/login.png" class="card-img-top" alt="..." style="height: auto; ">
            <div class="card-body">
               <h3 class="card-title" style="text-align:center;">CONNEXION</h3>
               <form method="POST" action="" style="text-align: center;">
                  <input type="email" name="identifiant" placeholder="Identifiant" />
                  <br>
                  <br>
                  <input type="password" name="password" placeholder="Mot de passe" />
                  <br /><br />
                  <input class="btn btn-primary" type="submit" name="formconnexion" value="Se connecter !" />
                  <br>
                  <?php
                     if(isset($erreur)) {
                        echo '<font color="red">'.$erreur."</font>";
                     }
                  ?>
               </form>
            </div>
         </div>

         
        
      </div>
      <div class="col-md-3"></div>

 </div>
   

     

<?php
      include("javascripts.php");
      include("footer.php");
?>
