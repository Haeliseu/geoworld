<?php
session_start();
?>

<!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>GeoWorld - App</title>

  <!-- Bootstrap core CSS -->
  
  <link href="assets/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
  

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continents</a>
             <div class="dropdown-menu" aria-labelledby="dropdown01">
           <form action="index-continent.php" method="get">
             <button type="submit" name="continent" value="Africa" class="dropdown-item"> Les Pays d'Afrique</button>
             <button type="submit" name="continent" value="Asia" class="dropdown-item">Les Pays d'Asie</button>
             <button type="submit" name="continent" value="North America" class="dropdown-item">Les Pays d'Amérique du Nord</button>
             <button type="submit" name="continent" value="South America" class="dropdown-item">Les Pays d'Amérique du Sud</button>
             <button type="submit" name="continent" value="Europe" class="dropdown-item">Les Pays d'Europe</button>
             <button type="submit" name="continent" value="Oceania" class="dropdown-item">Les Pays d'Océanie</button>
             <button type="submit" name="continent" value="Antartica" class="dropdown-item">Les Pays d'Antarctique</button>
           </form>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            ProjetPPE-SLAM
          </a>
        </li>
        <?php
          if (isset($_SESSION["prenom"]) && $_SESSION["prenom"] == true) {
            echo '<li class="nav-item">
    
                      <a class="nav-link " href="profil.php">
          
                      <td class="nav-link">Compte '.$_SESSION["prenom"]." ".$_SESSION["nom"];'?></td>
                      </a>
                    </li>';
          }else {
            echo ' <li class="nav-item">
            <a class="nav-link" href="connexion.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>';
          }
        ?>
        
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
        <input class="form-control mr-sm-2" type="text" placeholder="Tapez ici pour rechercher" aria-label="Search" name="recherche">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Recherche</button>
      </form>
    </div>
  </nav>
</header>
