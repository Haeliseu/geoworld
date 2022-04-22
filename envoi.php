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

$dateCrea = date("Y-m-d H:i:s"); 
include("inc/connect_db.php");
 
/* insérer les données dans la base de données*/
	$stmt = $pdo->prepare("INSERT INTO user_data VALUES ('".$identifiant."','".$nom."','".$prenom."','".$P_ou_E."','".$tel."','SHA1('".$mot_de_passe."')");
	$stmt->execute();
	echo $sql;
	
/*exécution de la requete*/
	
	$_SESSION["identifiant"]=$identifiant;
	$_SESSION["nom"]=$nom;
	$_SESSION["prenom"]=$prenom;
    
/*deconnexion à la base de données*/
    
	header('location: compte.php');
?>