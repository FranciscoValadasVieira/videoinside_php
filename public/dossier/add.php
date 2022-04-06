<?php 
require __DIR__ . "./../../src/functions.php";
require __DIR__ . "./../../db/connexion.php";
render('header', ['title'=>'Ajouter un Dossier']);

//Récuperation des chefs de projet
$connexion = new Connexion();
$pdoStatement = $connexion->prepare("select nom_cdp from chef_projet;");
$pdoStatement->execute();
$chefs= $pdoStatement->fetchAll();

?>

<div class="container">
<h1>Ajouter un dossier</h1>

<form action="add_traitement.php" method="post">
    <div class="form-control">

        <div class="form-group">
        <label for="nom">Nom du Dossier</label>
        <input id="nom" type="text" class="form-control" name="nom" required>
        </div><br>

        <div class="form-group">
        <label for="start">Date d'entrée</label>
        <input id="start" type="date" class="form-control" name="start" required>
        </div><br>

        <div class="form-group">
        <label for="description">Déscription</label>
        <input name="description" id="description" class="form-control" required></input>
        </div><br>

        <!-- utilisation de JS, pour afficher le champ INPUT pour inserer un nouveau chef de projet dans le cas ou "option=Autre" est choisi-->
        <!-- <script >
            function optionsChef(){
            document.getElementById("autreInput").removeAttribute("hidden");
            }
        </script> -->

          <div class="form-group">
        <label for="nom_cdp">Chef de projet</label><br>
        <select  id = "nom_cdp" name="nom_cdp" class="form-control">
            <?php foreach ($chefs as $c): ?>
                <?='<option value="' . $c['nom_cdp'] .'">'.$c['nom_cdp'].'</option>'?>
               
            <?php endforeach;?>
            <option id="autre" value="Autre">Autre</option>
        </select>
        
        <!-- <input type="hidden" id="autreInput" name="nom_cdp" class="form-control" placeholder="--- Inserez le nom du chef de projet ---">    -->
        </div><br>

        <div class="form-group">
        <label for="deadline_date deadline_hour">Deadline</label>
        <input id="deadline_date" type="date" class="form-control" name="deadline_date" required>
        <input id="deadline_hour" type="time" class="form-control" name="deadline_hour" required>
        </div>
        <br>
        <div class="form-group">
        <button class="btn btn-primary">Ajouter le dossier</button>
        </div>

    </div>
</form>

</div>

<?php 
render('footer');
?>