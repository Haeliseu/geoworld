<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 

$query = $_GET['recherche'];
$queryText = $query;
// Création requête préparée affichant totalité des résultats

$stmt = $pdo->prepare("SELECT * FROM `country` WHERE (`Continent` LIKE :temp1) 
OR (`Name` LIKE :temp2) 
OR (`Region` LIKE :temp3)
OR (`LocalName` LIKE :temp4)");

//Création requête comptant le nombre de résultats
$stmt2 = $pdo->prepare("SELECT COUNT(id) as total FROM `country` WHERE (`Continent` LIKE :temp5) 
OR (`Name` LIKE :temp6) 
OR (`Region` LIKE :temp7)
OR (`LocalName` LIKE :temp8)");

// Ajout du LIKE OPERATOR à la variable
$query = "%".$query."%";

// On remplace les valeurs des variables pour la première requête
$stmt->bindParam(":temp1", $query, PDO::PARAM_STR);
$stmt->bindParam(":temp2", $query, PDO::PARAM_STR);
$stmt->bindParam(":temp3", $query, PDO::PARAM_STR);
$stmt->bindParam(":temp4", $query, PDO::PARAM_STR);

// On remplace les valeurs des variables pour la deuxième requête
$stmt2->bindParam(":temp5", $query, PDO::PARAM_STR);
$stmt2->bindParam(":temp6", $query, PDO::PARAM_STR);
$stmt2->bindParam(":temp7", $query, PDO::PARAM_STR);
$stmt2->bindParam(":temp8", $query, PDO::PARAM_STR);

// On execute les requêtes
$stmt->execute();
$stmt2->execute();
while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) :
      ?>

<div class="container">
    <div class="col-md-12">
        <h2 class="titre-result" style="text-align: center;">Résultats de recherches pour <u><?php echo $queryText; ?></u></h2>
        <p style="text-align: center;"> <?php echo $row2['total']?> résultats trouvé(s)</p>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
        
        
?>

        <div class="card" style="width: 18rem; display:inline-block; margin: 2vw; background-color:lightslategray;">
        <img src="<?php echo 'media/'.strtolower(htmlspecialchars($row['Code2'])).'.png';?>" class="card-img-top" alt="<?php echo 'media/'.htmlspecialchars(strtolower($row['Code2']));?>.png">
        <div class="card-body" >
          <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['Region']); ?></h6>
          <form action="pays.php" method="get">
            <button type="submit" class="btn btn-primary" style="float: right; margin-bottom:6px;" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>">Découvrir</button>
          </form>
        </div>
      </div>
      <?php 
    endwhile;
    endwhile; ?>


      </div>


</div>


<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>