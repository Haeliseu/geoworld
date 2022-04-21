<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 
?>

<!DOCTYPE html>
<html>
<body>
    <div class="ui container">
    <center>
    <h1>Les Pays d'Antarctique</h1>
    </center>
  <div class="container">
  <?php 
     $stmt = $pdo->prepare("SELECT * FROM country WHERE Continent = 'antarctica'");
     $stmt->execute();
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     
     <div class="card" style="width: 18rem; display:inline-block; margin: 2vw; background-color:lightslategray;">
        <img src="<?php echo 'media/'.strtolower(htmlspecialchars($row['Code2'])).'.png';?>" class="card-img-top" alt="<?php echo 'media/'.htmlspecialchars(strtolower($row['Code2']));?>.png">
        <div class="card-body" >
          <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($row['Region']); ?></h6>
          <a href="pays.php" class="btn btn-primary" style="float: right; margin-bottom:6px;">Découvrir</a>
        </div>
      </div>


     <?php endwhile; ?>
  </div>

   
</body>
</html>
</div>
<p></p>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>