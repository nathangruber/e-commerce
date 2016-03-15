<?php require_once'includes/session.php';?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    ?>
 <?php require_once 'includes/header.php';?>
     <title>About Blake's Board Shop</title>
 </head>


      <div class="container">
        <div class = "row">
        <div class="col-md-12">
<div class = "abouttext">


<p>Blake's Board Shop is family owned and operated.</p></div>
        </div>
      </div>
    </div>
        
<div class="image">
<img src="assets/img/bbs1.png" width="144" height="126">
</div>





   
<?php
require_once('footer.php');
?>
   

   
  </body>
</html>