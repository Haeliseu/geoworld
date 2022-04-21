<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 




$query = $_GET['recherche'];

$stmt = $pdo->prepare("SELECT * FROM country WHERE (`Continent` LIKE '%".$query."%') 
OR (`Name` LIKE '%".$query."%') 
OR (`Region` LIKE '%".$query."%')
OR (`LocalName` LIKE '%".$query."%')");
      $stmt->execute();

      ?>

<div class="container">
    <div class="col-md-12">
        <h2 class="titre-result" style="text-align: center;">Résultats de recherches pour <u><?php echo $query; ?></u></h2>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
        
?>


 


        <div class="card" style="width: 18rem; display:inline-block; margin: 2vw; background-color:lightslategray;">
        <img src="<?php echo 'media/'.strtolower(htmlspecialchars($row['Code2'])).'.png';?>" class="card-img-top" alt="<?php echo 'media/'.htmlspecialchars(strtolower($row['Code2']));?>.png">
        <div class="card-body" >
          <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['Region']); ?></h6>
          <a href="pays.php" class="btn btn-primary" style="float: right; margin-bottom:6px;">Découvrir</a>
        </div>
      </div>
        
     
      <!-- echo"<form method='GET' action='pays.php'><tr><td><input type='submit' name='name' value='$name' style='border-radius: 25px; background-color: white;' name='$name'></input></td><td></form>";
  } -->
      <?php endwhile; ?>


      </div>


</div>


<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>