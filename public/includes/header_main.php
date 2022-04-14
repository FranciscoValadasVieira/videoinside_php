
<?php 
      session_start();
      // var_dump($_SESSION);
      require_once __DIR__ . "./../../src/constants.php";
      
   

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? h($title) : 'Agenda Motion Inside';?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
</head>


<body>
  
<!-- Création du nav du site -->
  <div id="menu">
    
    <a id="title" href="/videoinside_php/public/index.php"><h1>Videoinside</h1></a>
    
    <nav>        
      <a class="menu" href="/videoinside_php/public/agence.php">L'Agence</a>
         <ul><a class="menu" href="">Nos services</a>
              <li class="menu submenu"><a href="">Motion Design</a></li>
              <li class="menu submenu"><a href="">Productions</a></li>
              <li class="menu submenu"><a href="">Captation Live</a></li>
          </ul>  
      <a class="menu" href="">Contacts</a>
      <a class="menu" href="/videoinside_php/public/agenda_month.php">Agenda Motion Inside</a>
    </nav>
  </div>
      