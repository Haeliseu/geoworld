<?php include('header.php'); ?>
<div class="ui container">
    <center>
    <h1>Les Pays d'Afrique</h1>
    </center>
<div>
<table>
<?php
    require_once 'inc/manager-db.php';

include("connect-db.php");

$sql="SELECT * FROM country WHERE Continent ='Africa'";
$resultat=mysqli_query($db,$sql);
for($i=0;$i<=58;$i++){ 
echo"<tr>";
$ligne=mysqli_fetch_array($resultat);
$name= $ligne["Name"];
echo"</tr>";
echo"<form method='GET' action='pays.php'><tr><td><input type='submit' name='name' value='$name' style='border-radius: 25px; background-color: white;' name='$name'></input></td><td></form>";
}
?>
</table>
</div>
<p></p>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>