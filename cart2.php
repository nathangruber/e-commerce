<?php 
require_once 'includes/session.php';
require_once 'includes/database.php';
require_once 'includes/crud.php';
 error_reporting(E_ALL);
 setlocale(LC_MONETARY, 'en_US');

?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

 <body id="background">
	  <?php 
	     if ($admin) {
	      require_once'includes/adminNavbar.php';
	    } else {
	      require_once'includes/navbar.php';
	    }
      ?>
    

  <?php 
   require_once('includes/footer.php');
   //Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>