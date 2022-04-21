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
 <table>
   <thead>
     <tr>
       <th>Nom des pays</th>
     </tr>
   </thead>
   <tbody>
     <?php 
     $stmt = $pdo->prepare("SELECT * FROM country WHERE Continent = 'antarctica'");
     $stmt->execute();
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Name']); ?></td>
     </tr>
     <!-- echo"<form method='GET' action='pays.php'><tr><td><input type='submit' name='name' value='$name' style='border-radius: 25px; background-color: white;' name='$name'></input></td><td></form>";
} -->
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>
</div>
<p></p>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>