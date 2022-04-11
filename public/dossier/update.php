<?php 
include __DIR__ . './../includes/header_main.php';
require __DIR__ . "./../../src/functions.php";
require __DIR__ . "./../../db/connexion.php";
render('header_agenda', ['title'=>'Modifier un Dossier']);

//Récuperation des chefs de projet
$connexionFindCHef = new Connexion();
$pdoStatement = $connexionFindCHef->prepare("select nom_cdp from chef_projet;");
$pdoStatement->execute();
$chefs = $pdoStatement->fetchAll();
var_dump($chefs);

//Récuperation du dossier à modifier
$connexionFindDossier = new Connexion();
$pdoFindDossier = $connexionFindDossier->prepare("SELECT dossiers.id, nom, start, description, nom_cdp, deadline FROM dossiers, chef_projet WHERE dossiers.chef_projet_id=chef_projet.id AND dossiers.id=".$_GET['id'].";");
$pdoFindDossier->execute();
var_dump($pdoFindDossier);
$dossier = $pdoFindDossier->fetch();
var_dump($dossier);
$deadline = explode(" ", $dossier['deadline']); //Récuperation de la date et de l'heure du datetime
var_dump($deadline);

?>
<style>
    
    .hidden {
        display: none;
    }
    </style>
    

<div class="container">
<h1>Modifier un dossier</h1>

<form action="update_traitement.php?id=<?=$dossier['id']?>" method="post">
    <div class="form-control">

        <div class="form-group">
            <label for="nom">Nom du Dossier</label>
            <input id="nom" type="text" class="form-control" name="nom" required value="<?=$dossier['nom']?>" >
        </div><br>

        <div class="form-group">
            <label for="start">Date d'entrée</label>
            <input id="start" type="date" class="form-control" name="start" required value="<?=$dossier['start']?>">
        </div><br>

        <div class="form-group">
            <label for="description">Déscription</label>
            <input name="description" id="description" class="form-control" required value="<?=$dossier['description']?>"></input>
        </div><br>

  
   
        <div class="form-group">
            <label for="nom_cdp">Chef de projet</label><br>
            <select  id = "nom_cdp" name="nom_cdp" class="form-control">
                <?php foreach ($chefs as $c): ?>
                    <?php $selected = $c['nom_cdp'] == $dossier['nom_cdp']; ?>
                    <?php if ($selected) { //Récuperation du chef de projet 
                        echo '<option value="' . $c['nom_cdp'] .'" selected>'. $c['nom_cdp'].'</option>';
                    } else {
                        echo '<option value="' . $c['nom_cdp'] .'">'. $c['nom_cdp'].'</option>';
                    } ?>
                <?php endforeach;?>
                <option id="autre" value="Autre">Autre</option>
            </select>
        
        <div id="autre-chef" class="hidden">
        <input type='text' name='autre_chef' value='' class='form-control' placeholder="Put le nom d chef aqui"/>
        </div>

        </div><br>

        <div class="form-group">
            <label for="deadline_date deadline_hour">Deadline</label>
            <input id="deadline_date" type="date" class="form-control" name="deadline_date" value="<?=$deadline[0]?>" required>
            <input id="deadline_hour" type="time" class="form-control" name="deadline_hour" value="<?=$deadline[1]?>" required>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-primary">Modifier le dossier</button>
        </div>

    </div>
</form>

</div>

<!-- utilisation de JS, pour afficher le champ INPUT pour inserer un nouveau chef de projet dans le cas ou "option=Autre" est choisi-->
<script>
    var select = document.getElementById('nom_cdp');
    select.addEventListener('change', addField);
    function addField(event){
        console.log(event.target.value);
        let autre = document.getElementById('autre-chef');
               if (event.target.value =='Autre') {
                   autre.classList.remove("hidden");
               } else {
                autre.classList.add("hidden");
               }
            }
</script>

<?php 
render('footer');
?>