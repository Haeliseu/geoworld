<?php
session_start();
include("inc/connect_db.php");

// Récupération des données
$name = $_POST['nom'];
$govForm = $_POST['govForm'];
$surface = $_POST['surface'];
$population = $_POST['pop'];
$lifeEx = $_POST['lifeEx'];
$gnp = $_POST['gnp'];
$gnpOld = $_POST['gnpOld'];
$headOfState = $_POST['headOfState'];
$commentaire = $_POST['commentaire'];

// Conversion de la surface en float
$surface = floatval($surface);
// Conversion de la population en int
$population = intval($population); 

// Préparation de la requête 
$stmt = $pdo->prepare(
    "UPDATE `Country`
    SET `SurfaceArea` = :surface,
    `GovernmentForm` = :govform,
    `Population` = :pop,
    `LifeExpectancy` = :lifeEx,
    `GNP` = :gnp,
    `GNPOld` = :gnpOld,
    `HeadOfState` = :headOfState
    WHERE `Name` = :nom;"
);

//Paramétrage des données
$stmt->bindParam(":surface", $surface, PDO::PARAM_INT);
$stmt->bindParam(":govform", $govForm, PDO::PARAM_STR);
$stmt->bindParam(":pop", $population, PDO::PARAM_INT);
$stmt->bindParam(":lifeEx", $lifeEx, PDO::PARAM_STR);
$stmt->bindParam(":gnp", $gnp, PDO::PARAM_INT);
$stmt->bindParam(":gnpOld", $gnpOld, PDO::PARAM_STR);
$stmt->bindParam(":headOfState", $headOfState, PDO::PARAM_STR);
$stmt->bindParam(":nom", $name, PDO::PARAM_STR);
    
$stmt->execute();

// Retour vers la page quittée
header("location: pays.php?name=".$name."");
?>