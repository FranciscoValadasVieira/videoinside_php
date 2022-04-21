<?php

    include __DIR__ . './includes/header_main.php';
    include __DIR__ . './includes/header_agenda.php';
    require_once __DIR__ . './../src/functions.php';
    require_once __DIR__ . './../src/constants.php';

    $pdo = get_pdo();
    $dossiers = new Agenda\Dossiers($pdo);
    $week = new Agenda\Week($_GET['week'] ?? null, $_GET['year'] ?? null);
    $start = $week->getMondayOfWeek();
    // var_dump($start);
    $end = (clone $start) -> modify ('+ 6 days');
    // var_dump($end); 
    $dossiers = $dossiers->getDossiersBetweenByDay($start, $end);
    // var_dump($dossiers);
    $sunday=$week->getSundayOfWeek();
    // var_dump($sunday);
    ?>


<!-- Title Month et Creer les flèches de previous and after -->

<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?=$week->monthToString();?></h1>
        <div>
            <a href="/videoinside_php/public/agenda_week.php?week=<?=$week->previousWeek()->week; ?> &year=<?=$week->previousWeek()->year;?>">Precedent</a>
            <a href="/videoinside_php/public/agenda_week.php?week=<?=$week->nextWeek()->week; ?> &year=<?=$week->nextWeek()->year;?>">Apres</a>
        </div>
    </div>

   <!-- Creation du Calendrier Week -->

   <table class="calendar__table ">
    <?php for ($i = 0; $i <1; $i++) : ?>
        
        <tr>
            <?php foreach($week->days as $k => $day) : 
                $date = (clone $start)->modify("+" .($k+$i). "days");
                $dossiersForDay = $dossiers[$date->format('Y-m-d')] ?? [];
            ?>   
        <td class="calendar__day">
            <?php if ($i === 0) : ?>
                <div class="calendar__weekday"><?= $day?></div>
            <?php endif;?>
            <div class="calendar__day"> <?= $date->format('d');?></div>
            
            <?php foreach ($dossiersForDay as $d): ?>
                <div class="calendar__event">
                   <?= (new DateTime($d['deadline']))->format('H:i')?> - <a href="/videoinside_php/public/dossier/show.php?id=<?= $d['id'];?>"><?= h($d['nom']); ?></a>
                </div>
            <?php endforeach; ?>
        </td>
           <?php endforeach; ?>
        </tr>

    <?php endfor; ?>

    </table>
    
    <a href="dossier/add.php" class="button_plus">+</a>
    
</div>

<?php include __DIR__ . './../public/includes/footer.php';?>