<?php require_once 'header.php'; ?>
<table>
<?php
$id = $_GET["name"];

  $con = mysqli_connect("localhost","root","","worlddata");
  $sql = "SELECT Code, Name, GovernmentForm, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName FROM Country WHERE Name = '$id'";
  $resultat=mysqli_query($con, $sql);
  while($ligne=mysqli_fetch_array($resultat)){
      echo "<tr><th>Code</th><th>GovernmentForm</th><th>Continent</th><th>Region</th><th>SurfaceArea</th><th>IndepYear</th><th>Population</th><th>LifeExpectancy</th><th>GNP</th><th>GNPOld</th><th>LocalName</th>
            </tr><td>".$ligne["Code"]."</td><td>".$ligne["GovernmentForm"]."</td><td>".$ligne["Continent"]."</td><td>".$ligne["Region"]."</td><td>".$ligne["SurfaceArea"]."</td><td>".$ligne["IndepYear"]."</td><td>".$ligne["Population"]."</td><td>".$ligne["LifeExpectancy"].
           "</td><td>".$ligne["GNP"]."</td><td>".$ligne["GNPOld"]."</td><td>".$ligne["LocalName"]."</td></tr>";
  }
?>
</table>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>