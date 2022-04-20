<?php
	session_start();
	include("header_client.php"); 
?>
	<center> 
	<?php 
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
			echo "</br>";
		  	echo "<p class='titre'>Vous êtes connecté !</p>";
		  	echo "</br>";
		 	echo "Bienvenu(e) ".$_SESSION["prenom"]." ".$_SESSION["nom"]."";
		 	echo "</br>";
		  	echo "Votre identifiant est ".$_SESSION["identifiant"]."";
	?>
	</center>
<?php
    require_once 'javascripts.php';
    require_once 'footer.php';
?>
