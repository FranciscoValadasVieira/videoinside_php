<?php 
require __DIR__ . "./../../src/functions.php";
render('header', ['title'=>'Ajouter un événement']);
?>

<div class="container">
<h1>Ajouter un dossier</h1>

<form action="" method="post">
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
        <label for="descript">Déscription</label>
        <textarea name="description" id="descript" class="form-control" required></textarea>
        </div><br>

        <div class="form-group">
        <label for="cdp">Chef(e) de projet</label>
        <input id="cdp" type="text" class="form-control" name="nom_cdp" required >
        </div><br>

        <div class="form-group">
        <label for="deadline_date">Deadline</label>
        <input id="deadline_date" type="date" class="form-control" name="deadline_date" required>
        <input id="endeadline_hour" type="time" class="form-control" name="endeadline_hour" required>
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