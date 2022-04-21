
<?php

    include __DIR__ . './includes/header_main.php';
    include __DIR__ . './includes/header_agenda.php';
    require_once __DIR__ . './../src/functions.php';

    $pdo = get_pdo();
    $dossiers = new Agenda\Dossiers($pdo);
    $month = new Agenda\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    $start = $month->getStartingDay();
    $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
    $weeks = $month->getWeeks();
    $end = (clone $start) -> modify ('+' . (6 + 7 * ($weeks - 1)) . 'days');
    // var_dump($end); 
    $dossiers = $dossiers->getDossiersBetweenByDay($start, $end);
    // var_dump($events);
    // var_dump($dossiers);

    ?>
    
    
<!--Agenda MotionInside-->

<div class="calendar">

    <!-- Title Month et Creer les flèches de previous and after -->

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $month->toString();?></h1>
        <div>
            <a href="/videoinside_php/public/agenda_month.php?month=<?=$month->previousMonth()->month; ?> &year=<?=$month->previousMonth()->year;?>">Precedent</a>
            <a href="/videoinside_php/public/agenda_month.php?month=<?=$month->nextMonth()->month; ?> &year=<?=$month->nextMonth()->year;?>">Apres</a>
        </div>
    </div>

    <!-- Creation du Calendrier -->

    <table class="calendar__table calendar__table-<?=$weeks;?>-weeks">
    <?php for ($i = 0; $i < $weeks; $i++) : ?>
        
        <tr>
            <?php foreach($month->days as $k => $day) : 
                $date = (clone $start)->modify("+" . ($k+$i*7) . "days");
                $dossiersForDay = $dossiers[$date->format('Y-m-d')] ?? [];
            ?>   
        <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth';?>">
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