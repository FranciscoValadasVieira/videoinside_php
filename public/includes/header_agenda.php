

  <nav class="navbar navbar-dark bg-primary mb-2">
    <a href="/videoinside_php/public/agenda_month.php" class="navbar-brand">Agenda Motion Inside</a>
 
      <div class="d-flex">  
        
      <?php if (isset($_SESSION[CURRENT_USER])) : ?>
          <a href="<?php echo BASE_PATH; ?>/public/logout.php" class="btn btn-danger">Se Déconnecter</a>
        <?php else : ?>
          <a href="<?php echo BASE_PATH; ?>/public/login.php" class="btn btn-primary">Se Connecter</a>
        <?php endif; ?>
        </div>
  </nav>
    
    