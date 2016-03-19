<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>
    <?php require_once 'includes/navbar.php';?>

    
    <div class="container">
      <div class="starter-template">
        <h1></h1>
        <p class="lead">Enter Username and Password to login.<br></p>
      </div>
      <div>
        <form action="includes/login.php" method="post">
          <input type="text" name="username" placeholder="username">
          <input type="PASSWORD" name="password" placeholder="password">
          <input class="btn btn-default" type="submit" value="Login">        
        </form>
      </div>
      <div>
      	<p>No Account? Register below</p>
      </div>
      <div>
        <form action="register.php" method="post">
          <input class="btn btn-default" type="submit" value="Register">
        </form>
      </div>
    </div>

<?php
require_once 'includes/footer.php';
?>
  </body>
</html>
