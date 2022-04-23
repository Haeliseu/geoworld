<?php
/**
 * Récupération des données de l'utilisateur et envoie de ces données à la base de données
 * On crée une variable date pour l'ajouter dans l'insertion des informations
 * 
 * @param date $dateCrea date d'ajout à la bdd
 * 
 */
session_start();

$identifiant=$_POST["identifiant"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$P_ou_E=$_POST["P_ou_E"];
$tel=$_POST["tel"];
$mot_de_passe=$_POST["mot_de_passe"];
$dateNaissance = $_POST["dateNaissance"];

// On vérifie que la personne ait au moins 22 ans avant de lui attribuer le rôle de prof
$year = date($dateNaissance);
$yearInscrit = date('Y', strtotime($dateNaissance));
$year22 = date('Y', strtotime("-22 year"));
$yearInscrit22 = $yearInscrit - 22;
if ($yearInscrit > $year22 && $P_ou_E == 'P') {
	// On affecte à la variable la valeur d'élèves
	$P_ou_E = "E";
}


$dateCrea = date("Y-m-d H:i:s"); 
include("inc/connect_db.php");
 
/* insérer les données dans la base de données*/
	$stmt = $pdo->prepare("INSERT INTO `user_data` (`identifiant`, `nom`, `prenom`, `tel`, `mot_de_passe`, `P_ou_E`, `dateAjout`, `dateNaissance`)
	 VALUES (:identifiant,:nom,:prenom,:tel,SHA1(:pass),:p_ou_e,:dateAjout, :dateNaissance)");

	$stmt->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
	$stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
	$stmt->bindParam(":prenom", $prenom, PDO::PARAM_STR);
	$stmt->bindParam(":p_ou_e", $P_ou_E, PDO::PARAM_STR);
	$stmt->bindParam(":tel", $tel, PDO::PARAM_INT);
	$stmt->bindParam(":pass", $mot_de_passe, PDO::PARAM_STR);
	$stmt->bindParam(":dateAjout", $dateCrea);
	$stmt->bindParam(":dateNaissance", $dateNaissance);


	$stmt->execute();
	//echo $sql;
	
/*exécution de la requete*/
	
	$_SESSION["identifiant"]=$identifiant;
	$_SESSION["nom"]=$nom;
	$_SESSION["prenom"]=$prenom;
    
/*deconnexion à la base de données*/
    
	header('location: compte.php');
?>