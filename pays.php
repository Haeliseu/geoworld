<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 
 ?>
 <div class="container-fluid">
    <div class="row" style="margin: 20px;">
      <div class="col-md-12">
        <br>
        <br>

      

<?php
$id = $_GET["name"];

$stmt = $pdo->prepare("SELECT * FROM `Country` WHERE `Name` =:pays");

$stmt->bindValue(":pays", $id, PDO::PARAM_STR);

$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
  
?>
    <div class="card mb-2" style="max-width: 2000px;">
  
   
    <div class="col-md-12">
      <div class="card-body" style="text-align: center;">
        <h2 class="card-title" style="text-align: center;" id="namePays"><?php echo $row['Name'] ?></h2>
        <p class="card-text">
          <table class="table table-hover">
          <thead>
              <tr>
                <th scope="col">GovernmentForm</th>
                <th scope="col">Continent</th>
                <th scope="col">Region</th>
                <th scope="col">SurfaceArea</th>
                <th scope="col">Independance Year</th>
                <th scope="col">Population</th>
                <th scope="col">Life Expectancy</th>
                <th scope="col">GNP</th>
                <th scope="col">GNPOld</th>
                <th scope="col">Local Name</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row"><?php echo $row["GovernmentForm"] ?></td>
              <td><?php echo $row["Continent"] ?></td>
              <td><?php echo $row["Region"] ?></td>
              <td><?php echo $row["SurfaceArea"] ?></td>
              <td><?php echo $row["IndepYear"] ?></td>
              <td><?php echo $row["Population"] ?></td>
              <td><?php echo $row["LifeExpectancy"] ?></td>
              <td><?php echo $row["GNP"] ?></td>
              <td><?php echo $row["GNPOld"] ?></td>
              <td><?php echo $row["LocalName"] ?></td>
            </tr>
          </tbody>

          </table>
        </p>
        <p class="card-text"><small class="text-muted"><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $row['Name'] ?>" target="_blank"><?php echo $row['Name'] ?> sur Google Maps</a></small></p>
      </div>
    </div>
 
</div>
<br>
<br>
  
    <img src="<?php echo 'media/'.strtolower(htmlspecialchars($row['Code2'])).'.png';?>" alt=""  style="width: 100%; height:auto; border-radius:40px">
  

    </div>
    </div>
 </div>
 <?php endwhile; ?>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>