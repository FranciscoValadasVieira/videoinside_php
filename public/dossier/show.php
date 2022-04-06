
<?php
    require __DIR__ . './../../src/functions.php';
    require __DIR__ . './../../src/Agenda/Dossiers.php';
    
    // création du PDOStatement
    $pdo = get_pdo();
    $dossiers = new Agenda\Dossiers($pdo);
    print_r($dossiers); //debogage
    
    
    if (!isset($_GET['id'])) {
        header('location:404.php');
    }
    
    try {
    $dossier = $dossiers->findDossier($_GET['id'] ?? null);
    // print_r($event);//debogage
    dd($dossier);//debogage/
    
} catch (\Exception $e) {
    e404();
}

render('header', ['title' => $dossier-> getNom()]); 
    ?>
   

<h1><?= h($dossier->getNom()); ?></h1>

<ul>
<li>Start: <?= $dossier->getStart()->format('d/m/Y');?></li>
<li>Description: <?= h($dossier->getDescription());?></li>
<li>Chef(e) de projet: <?= h($dossier->getNomCdp())?></li>
<li>Deadline: <?= $dossier->getDeadline()->format('d/m/Y - H:i');?></li>
</ul>

<a role="button" href="/videoinside_php/public/dossier/update.php?id=<?= $_GET['id'];?>">Modifier</a>
<a role="button" href="/videoinside_php/public/dossier/remove.php?id=<?= $_GET['id'];?>">Supprimer</a>
 
