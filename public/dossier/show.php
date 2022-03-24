
<?php
    require __DIR__ . './../../src/functions.php';
    require __DIR__ . './../../src/Calendar/Events.php';
    
    // création du PDOStatement
    $pdo = get_pdo();
    $events = new Calendar\Events($pdo);
    print_r($events); //debogage
    
    
    if (!isset($_GET['id'])) {
        header('location:404.php');
    }
    
    try {
    $event = $events->findEvent($_GET['id'] ?? null);
    // print_r($event);//debogage
    dd($event);//debogage/
    
} catch (\Exception $e) {
    e404();
}

render('header', ['title' => $event-> getNom()]); 
    ?>
   

<h1><?= h($event->getNom()); ?></h1>

<ul>
<li>Start: <?= $event->getStart()->format('d/m/Y');?></li>
<li>Description: <?= h($event->getDescription());?></li>
<li>Chef(e) de projet: <?= h($event->getNomCdp())?></li>
<li>Deadline: <?= $event->getDeadline()->format('d/m/Y - H:i');?></li>
</ul>
 
