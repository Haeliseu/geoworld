<?php

	include("header.php"); ?>
  <div class="container">
    <div class="row">

    <div class="col-md-2">
     
     </div>
     <div class="col-md-8">
     <h2 class="log" style="text-align: center;">Créer son compte</h2>
     <br>
     <form action="envoi.php" method="post" style="background-color: lightgray; padding:15px; border-radius:5px; box-shadow: 10px 5px 5px gray;">
       <div class="mb-3">
         <label for="inputEmail" class="form-label">Identifiant(email) :</label>
         <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="identifiant" value="" required>
       </div>
 
       <div class="mb-3">
         <label for="inputPassword" class="form-label">Mot de Passe :</label>
         <input type="password" class="form-control" id="password"  name="mot_de_passe" value="" required>
       </div>
 
       <div class="mb-3">
         <label for="name" class="form-label">Nom :</label>
         <input type="text" class="form-control" id="name"  name="nom" value="" required>
       </div>
 
       <div class="mb-3">
         <label for="prenom" class="form-label">Prenom :</label>
         <input type="text" class="form-control" id="prenom"  name="prenom" value="" required>
       </div>
 
       <div class="mb-3">
         <label for="tel" class="form-label">Téléphone :</label>
         <input type="tel" class="form-control" id="tel"  name="tel" value="" required>
       </div>
       <div class="mb-3" style="width: 12vw;">
         <label for="tel" class="form-label">Date de naissance :</label>
         <input type="date" class="form-control" id="dateNaissance"  name="dateNaissance" value="" required>
       </div>
       <h5>Statut :</h5>
       <div class="form-check">
         <required>
         <input type="radio" class="form-check-input" value="P"  name="P_ou_E">
         <label class="form-check-label" for="P">
           Professeur
         </label>
         <br>
         <input type="radio" class="form-check-input" value="E"  name="P_ou_E" checked>
         <label class="form-check-label" for="E">
           Élève
         </label>
         </required>
         
       </div>
       <br>
       <button type="submit" class="btn btn-primary" name="Inscription" value="valider">Valider</button>
       <button type="reset" class="btn btn-secondary" name="reset" value="annuler">Annuler</button>
       
     </form>
     </div>
     <div class="col-md-2"></div>
   </div>

    </div>
    
	
<?php
        if (isset ($_POST['register'])){
            //On récupère les valeurs entrées par l'utilisateur :
            $identifiant=$_POST["identifiant"];
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $P_ou_E=$_POST["P_ou_E"];
            $tel=$_POST["tel"];
            $mot_de_passe=$_POST["mot_de_passe"]; 
            $dateNaissance = $_POST["dateNaissance"];
           
            }
        require_once 'javascripts.php';
        require_once 'footer.php';
?>