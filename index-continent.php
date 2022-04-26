<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 

// Récupération du nom du continent
$name = $_GET["continent"];

// Préparation de la requête 
$stmt = $pdo->prepare("SELECT * FROM `country` WHERE `Continent` = :continent");

// Paramétrage de la valeur de continent
$stmt->bindValue(":continent", $name, PDO::PARAM_STR);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<body>
    <div class="ui container">
    <center>
    <h1>Les Pays d' <?php echo $name; ?></h1>
    </center>
  <div class="container pays">

    <div class="col-md-12">
      <?php 
      
      //Déclenchement de la boucle de récupération des données
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

      <div class="card" style="width: 18rem; display:inline-block; margin: 2vw; background-color:lightslategray;">
        <img src="<?php echo 'media/'.strtolower(htmlspecialchars($row['Code2'])).'.png';?>" 
        class="card-img-top" alt="<?php echo 'media/'.htmlspecialchars(strtolower($row['Code2']));?>.png">
        <div class="card-body" >
          <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['Region']); ?></h6>
          <form action="pays.php" method="get">
            <button type="submit" class="btn btn-primary" style="float: right; margin-bottom:6px;" 
            name="name" value="<?php echo htmlspecialchars($row['Name']); ?>">Découvrir</button>
          </form>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
   </div>
 
</body>
</html>
</div>
<p></p>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>