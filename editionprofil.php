<?php
    include('header.php');
 
    if (!isset($_SESSION['idUser'])){
        header('Location: index.php');
        exit;
    }
 
    $getid = intval($_SESSION['idUser']);
    $afficher_profil = $pdo->prepare('SELECT * FROM user_data WHERE idUser = ?');
    $afficher_profil->execute(array($getid));
    $afficher_profil = $afficher_profil->fetch();
    // $afficher_profil = $db->query("SELECT * 
    //     FROM utilisateur 
    //     WHERE id = ?",
    //     array($_SESSION['id']));
    // $afficher_profil = $afficher_profil->fetch();
 
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $nom = htmlentities(trim($nom));
            $prenom = htmlentities(trim($prenom));;

 
            if(empty($nom)){
                $valid = false;
                $er_nom = "Il faut mettre un nom";
            }
 
            if(empty($prenom)){
                $valid = false;
                $er_prenom = "Il faut mettre un prénom";
            }

            if(empty($tel)){
                $valid = false;
                $er_tel = "Il faut mettre un numéro de téléphone";
            }
            
            if(empty($dateNaissance)){
                $valid = false;
                $er_dateNaissance = "Il faut mettre une date de naissance";
            }
 
            if ($valid){
                $stmt = $pdo->prepare('UPDATE user_data SET prenom = ?, nom = ?, tel = ?, dateNaissance = ? WHERE idUser = ? WHERE idUser = ?');
                $stmt->execute(array($getid));
                $userinfo = $stmt->fetchAll()  ;
 
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['tel'] = $tel;
                $_SESSION['dateNaissance'] = $dateNaissance;
 
                header('Location:  profil.php');
                exit;
            }   
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Modifier votre profil</title>
    </head>
    <body>      
        <div>Modification</div>
        <form method="post">
            <?php
                if (isset($er_nom)){
                ?>
                    <div><?= $er_nom ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>   
            <?php
                if (isset($er_prenom)){
                ?>
                    <div><?= $er_prenom ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_profil['prenom'];}?>" required>   
            <?php
                if (isset($er_tel)){
                ?>
                    <div><?= $er_tel ?></div>
                <?php   
                }
            ?>
            <input type="tel" placeholder="Téléphone" name="tel" value="<?php if(isset($tel)){ echo $tel; }else{ echo $afficher_profil['tel'];}?>" required>
            <?php
                if (isset($er_dateNaissance)){
                ?>
                    <div><?= $er_dateNaissance ?></div>
                <?php   
                }
            ?>
            <input type="date" placeholder="Date de naissance" name="dateNaissance" value="<?php if(isset($dateNaissance)){ echo $dateNaissance; }else{ echo $afficher_profil['dateNaissance'];}?>" required>
            <button type="submit" name="modification">Modifier</button>
        </form>
    </body>
</html>
