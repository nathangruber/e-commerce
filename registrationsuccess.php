<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html>
<html>
<?php require_once 'includes/header.php';?>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<body>
<?php 
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    ?>
<h3>Successfully Registered</h3>
<center><p>You have successfully created an account at BBS, please login.</center>
<p>go <a class="btn btn-default" href="index.php">back</a> or <a class="btn btn-default" href="loginpage.php">login</a>.</p>



<?php require_once 'includes/footer.php'; ?>

	</body>
</html>
