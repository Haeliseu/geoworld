<?php 
include('header.php');
include('inc/manager-db.php');
include('inc/connect_db.php');
extract($_GET); 
?>

<div class="ui container">
    <center>
    <h1>Les Pays d'Afrique</h1>
    </center>
<div>
<table>

<?php
$stmt = $pdo->prepare("SELECT * FROM country WHERE Continent = 'Africa'");
$stmt->execute();
$ligne = $stmt->fetch();

    for($i=0;$i<=58;$i++){ 
    echo"<tr>";
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