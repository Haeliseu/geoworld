<?php
session_start();
	include("header.php"); ?>
	<form action="envoi.php" method="post">
     <p class="log">Login</p>
		  <table>
			<tr><td> Identifiant(email): </td><td><input type="email" name="identifiant" value="" required /></td></tr>
			<tr><td> Mot de Passe: </td><td><input type="password" name="mot_de_passe" value="" required /></td></tr>
			<tr><td> Nom: </td><td><input type="text" name="nom" value="" required /></td></tr>
			<tr><td> Prenom: </td><td><input type="text" name="prenom" value="" required /></td></tr>
			<tr><td> Téléphone: </td><td><input type="text" name="tel" value="" required /></td></tr>
      <tr><td> Professeur ou Elève: </td><td><input type="radio" id="P" name="P_ou_E"> Professeur </required>  <input type="radio" id="E" name="P_ou_E"> Elève </required></td></tr>
			<tr><td></td><td><input type="submit" name="Inscription" value="valider" /></td></tr>
			<tr><td></td><td><input type="reset" name="reset" value="annuler" /></td></tr>
		  </table>
</form>
<?php
        if (isset ($_POST['register'])){
            //On récupère les valeurs entrées par l'utilisateur :
            $identifiant=$_POST["identifiant"];
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $P_ou_E=$_POST["P_ou_E"];
            $tel=$_POST["tel"];
            $mot_de_passe=$_POST["mot_de_passe"]; 
            //On se connecte
            $db=mysqli_connect("localhost","root","","worlddata") or die ("erreur de connexion au serveur");
		        mysqli_select_db($db,"worlddata");
            //On prépare la commande sql d'insertion
            $sql="INSERT INTO user_data VALUES ('".$identifiant."','".$nom."','".$prenom."','".$P_ou_E."','".$tel."','".$mot_de_passe."')"; 
		      	$resultat=mysqli_query ($db,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($db)); 
				    echo "Votre compte a été crée avec succes.";
            // on ferme la connexion
            mysqli_close($db);
            }
        require_once 'javascripts.php';
        require_once 'footer.php';
?>