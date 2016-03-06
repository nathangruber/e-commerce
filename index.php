<?php require_once('includes/session.php');?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
  <body>
    <?php require_once 'includes/navbar.php';?>
      <header class="main-header" role="banner">
  <img src="assets/img/skateboard-447147_1920.jpg" alt="Banner Image" width="1500" height="400">
     </header> 
</div>
</div>
            <div class="container">
           <div class = "row">
         <div class="col-md-6">
      <div class = "home">       
<p>Blake’s is a locally-owned skateboard shop.</p><br>
     </div>
        
      <div class="container" >
      <div class="starter-template">
        <h1></h1>
        <p class="lead"><small>Please Login or click Register to set up an account with Blake's.<br></p>
      </div>
      <div>
        <center>
<form action="loginpage.php" method="post">
          <input type="submit" value="Login">
        </form>
      </div>
      <br>
       </center>
<center>
       <div>
<form action="includes/logout.php" method="post"> 
          <input type="submit" value="Logout">
        </form>
      </div>
      </center>
      <center>
      <div>
        <br>
<form action="register.php" method="post">
          <input type="submit" value="Register">
        </form>
      </div>
     </center>

        <?php
          if ($logged) {
            echo "You are logged in succesfully.";
            echo '<form method="POST" action="update.php">';
            echo '<input type="submit" value="Update User Info">';
            echo '</form>';
          
          } else {
            echo "You are logged out.";
          }
        ?>
      </div>
    </div><!-- /.container -->
<?php
require_once 'includes/footer.php';
?>
   

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

