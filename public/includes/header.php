
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? h($title) : 'Agenda Motion Inside';?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../public/css/calendar.css">
    
  
</head>
<body>
  <nav class="navbar navbar-dark bg-primary mb-2">
    <a href="/videoinside_php/public/agenda.php" class="navbar-brand">Agenda Motion Inside</a>
 
      <div class="d-flex">
        
    
      <?php 
      session_start();
      // var_dump($_SESSION);
      require_once __DIR__ . "./../../src/constants.php";
      
      if (isset($_SESSION[CURRENT_USER])): ?>
        <a href='/videoinside_php/public/logout.php' class="btn btn-danger">Se Déconnecter</a>
      <?php else : ?>
        <a href="/videoinside_php/public/login.php" class="btn btn-primary">Se Connecter</a>
      <?php endif; ?>
      
  
      
  </nav>
    
    