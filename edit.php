<?php
    include ('header.php');
    include ('inc/connect_db.php');
    extract($_GET); 
    $id = $_GET['name'];

    $stmt = $pdo->prepare("SELECT * FROM `Country` WHERE `Name` =:pays");

    $stmt->bindValue(":pays", $id, PDO::PARAM_STR);

    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 style="text-align: center;">Editer ce pays</h2>
            <br>

            <form action="maj_pays.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nom du Pays</span>
                    <input type="text" class="form-control" placeholder="Pays" value="<?php echo $row['Name']; ?>" name="nom" disabled>
                </div>
                <h4 for="basic-url" class="form-label" style="text-align: center;">Infos du Pays</h4>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Government Form</span>
                    <input type="text" class="form-control" placeholder="Government Form" value="<?php echo $row['GovernmentForm']; ?>" name="govForm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Surface Area</span>
                    <input type="text" class="form-control" placeholder="Surface Area" value="<?php echo $row['SurfaceArea']; ?>" name="surface">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Population</span>
                    <input type="text" class="form-control" placeholder="Population" value="<?php echo $row['Population']; ?>" name="pop">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Life Expectancy</span>
                    <input type="text" class="form-control" placeholder="Life Expectancy" value="<?php echo $row['LifeExpectancy']; ?>" name="lifeEx">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">GNP</span>
                    <input type="text" class="form-control" placeholder="GNP" value="<?php echo $row['GNP']; ?>" name="gnp">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">GNP Old</span>
                    <input type="text" class="form-control" placeholder="GNP Old" value="<?php echo $row['GNPOld']; ?>" name="gnpOld">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Head of State</span>
                    <input type="text" class="form-control" placeholder="head of state" value="<?php echo $row['HeadOfState']; ?>" name="headOfState">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Commentaires</span>
                    <textarea class="form-control" value="" name="commentaire" id="com"></textarea>
                </div>
                <br>
                <a href="pays.php?name=<?php echo $row['Name'] ?>" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary" style="float:right;" name="nom" value="<?php echo $row['Name'] ?>">Enregistrer</button>
            </form>
            
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script>
    // Fonction permettant d'ajouter la date de mise à jour dans le champ de commentaire.
    function addDateMaj() {
        var today = new Date();
        today = today.toLocaleDateString("fr");
        var commentaire = document.getElementById('com');
        commentaire.innerHTML += '['+today+ '] \r\n' ;
    }
    window.onload = addDateMaj();
</script>
<?php 
endwhile;
include ('footer.php');

?>