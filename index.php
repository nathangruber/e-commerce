<?php require_once('includes/session.php');?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
<body>
    <?php 
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    ?>
      <?php
      if ($logged) {
        echo "Welcome Back, ";
        echo $_SESSION['name'];
      }
      ?>
  
<header class="main-header" role="banner">
  
  <div id="container">

<div class="leftimage"><img src="assets/img/bbs1.png" alt="BBS logo" height="96" width="126"></div>
<div class="righttext">Blake’s is a family-owned skateboard shop. <a href="https://twitter.com/bbshop" class="twitter-follow-button" data-show-count="false">Follow @bbshop</a>
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
   </div> 

</div>
      <img id="banner" src="assets/img/skateboard-447147_1920.jpg" alt="Banner Image">
</header> 
      
 <div class="container">
   <div class="img-responsive col-sm-4">
    <a href="productPage.php">
    <img id="board" src="assets/img/6796009882_074f87df69_b.jpg" class="img-rounded" alt="Skateboard" height="187" width="333">
   </a>
  </div>
 
   <div class="img-responsive col-sm-4">
     <a href="productPage.php">
    <img id="long" src="assets/img/18752831476_4634222c05_b.jpg" class="img-rounded" alt="Longboard" height="187" width="333">
     </a>
  </div>
 
   <div class="img-responsive col-sm-4">
     <a href="productPage.php">
    <img id="truck" src="assets/img/maxresdefault.jpg" class="img-rounded" alt="Skate Truck" height="187" width="333">
     </a>
   </div>
 </div> 
 
  <div class ="bbstext1">
    <div class="container" >
      <div class="starter-template">
        <h1></h1>
      <center>  
        <p class="lead"><img class="img-responsive logo" src="assets/img/bbs.png" height="27" width="27">Please Login or click Register to set up an account with Blake's</p>
      <small>Our members get access to discounts and free merch</small><br>
      </center>
      </div>
    </div>
  </div>
       <div>
        <center>
<form action="loginpage.php" method="post">
          <input class="btn btn-default" type="submit" value="Login">
        </form>
      </div>
      <br>
       </center>
       <center>
      <div>
<form action="includes/logout.php" method="post"> 
          <input class="btn btn-default" type="submit" value="Logout">
        </form>
      </div>
      </center>
      <center>
    <div>
        <br>
<form action="register.php" method="post">
          <input class="btn btn-default" type="submit" value="Register">
        </form>
      </div>
      </center>

        <?php
          if ($logged) {
            echo "You are logged in succesfully.";
            echo '<form method="POST" action="update.php">';
            echo '<input class="btn btn-default" type="submit" value="Update User Info">';
            echo '</form>' ;
          
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
