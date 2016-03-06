<?php require_once('includes/session.php');?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
  <body>
    <?php require_once 'includes/navbar.php';?>
      <header class="main-header" role="banner">
  <img src="assets/img/skateboard-447147_1920.jpg" alt="Banner Image" width="1500" height="400">
     </header> 
      
      <div class = "container">       
<p>Blake’s is a locally-owned skateboard shop.</p><br>
     </div>
       <div class="container">
 <div class="img-responsive col-sm-2">
   <img id="board" src="assets/img/6796009882_074f87df69_b.jpg" class="img-rounded" alt="Skateboard" height="187" width="333">
 </div>
 <br>
 <div class="img-responsive col-sm-2">
   <img id="long" src="assets/img/18752831476_4634222c05_b.jpg" class="img-rounded" alt="Longboard" height="187" width="333">
 </div>
 <br>
 <div class="img-responsive col-sm-2">
   <img id="truck" src="assets/img/maxresdefault.jpg" class="img-rounded" alt="Skate Wheel" height="187" width="333">
 </div>
 <br>
</div> 
      <div class="container" >
      <div class="starter-template">
        <h1></h1>
        <p class="lead"><small>Please Login or click Register to set up an account with Blake's.</small><br></p>
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
</div>
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

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
require_once 'includes/footer.php';
?>
