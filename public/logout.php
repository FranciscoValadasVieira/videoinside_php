
<?php
require_once __DIR__ . './includes/header_main.php';
require_once __DIR__ . './includes/header_agenda.php';
unset($_SESSION[CURRENT_USER]); ?>

<a href="login.php" class="btn btn-primary">Se Connecter</a>

<?php header('location:' . BASE_PATH . '/public/agenda.php');?>