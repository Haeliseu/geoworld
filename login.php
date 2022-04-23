<?php
	session_start();
	$identifiant=$_POST["identifiant"];
	$mot_de_passe=$_POST["mot_de_passe"];
	
	/*connecter à la base de donnée*/
 include("/connect_db.php");
 
 $stmt = $pdo->prepare("SELECT identifiant ,nom,prenom,mot_de_passe FROM user_data WHERE identifiant= ':identifiant and mot_de_passe=:pass");
$stmt->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
$stmt->bindParam(":pass", $mot_de_passe, PDO::PARAM_STR);

 $stmt->execute();
 if (!$stmt->rowCount())
	{  include("header.php");
	echo "<table class='center'>
	<tr>
		<td>";
	echo "<p class='titre'>Votre identifiant ou votre mot de passe est incorrect</p>";
	echo "</td>
	</tr>
	</table>";
	include("javascripts.php");
	include("footer.php");
	}
else {
	if ($stmt=mysqli_fetch_array($resultat))
		//tant qu'il reste un enregistrement à affecter
	{
		$_SESSION["identifiant"]=$ligne["identifiant"];
		$_SESSION["nom"]=$ligne["nom"];
		$_SESSION["prenom"]=$ligne["prenom"];
		header('location:index_client.php');
	}
	}
?>