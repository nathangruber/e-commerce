<?php require_once('includes/session.php');?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
  <body>
    <?php require_once 'includes/navbar.php';?>
      <header class="main-header" role="banner">
  <h1><img src="assets/img/bbs.png" title="Blake's Board Shop Logo" alt="Blake's Board Shop Logo"></h1>
  <img id="banner" src="assets/img/skateboard-447147_1920.jpg" alt="Banner Image">
     </header> 
      
      
       <div class="container">
 <div class="img-responsive col-sm-4">
   <img id="board" src="assets/img/6796009882_074f87df69_b.jpg" alt="Skateboard" height="187" width="333">
 </div>
 
 <div class="img-responsive col-sm-4">
   <img id="long" src="assets/img/18752831476_4634222c05_b.jpg" alt="Longboard" height="187" width="333">
 </div>
 
 <div class="img-responsive col-sm-4">
   <img id="truck" src="assets/img/maxresdefault.jpg" alt="Skate Truck" height="187" width="333">
 </div>
 </div> 
       <div class = "bbstext">       
<p>Blake’s is a locally-owned skateboard shop.</p><br>
     </div>
      <div class ="bbstext1">
      <div class="container" >
      <div class="starter-template">
        <h1></h1>
      <center>  
        <p class="lead"><img class="img-responsive logo" src="assets/img/bbs.png" height="27" width="27">Please Login or click Register to set up an account with Blake's</p>
      <small>Our members get access to coupons and free stuff</small><br>
      </center>
      </div>
    </div>
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

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
require_once 'includes/footer.php';
?>
