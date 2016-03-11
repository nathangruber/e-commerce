<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>

  <?php require_once('includes/navbar.php'); ?>

  <div class="container">

  </div>
</body>
</html>
