<?php
/*connexion au SGBDR MySQL*/
$db=mysqli_connect("localhost","root","") or die ("erreur de connexion au serveur");
/*selectionner la base de données souhaitée*/
mysqli_select_db($db,"world_db");
?>