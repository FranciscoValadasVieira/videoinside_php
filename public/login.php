
<?php
include __DIR__ . "./includes/header.php";
?>

<form method="post" action="login_traitement.php">
  <label for="username">Username</label><br>
  <input id="username" type="text" name="username"><br>
  <label for="password">Password</label><br>
  <input id="password" type="password" name="password"><br><br>
  <input type="submit" value="Se connecter">
</form>

<?php
include __DIR__ . "./includes/footer.php";
?>

