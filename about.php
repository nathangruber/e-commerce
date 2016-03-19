<?php require_once'includes/session.php';?>
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

      <div class="container">
        <div class = "row">
     
<div class = "abouttext">
<title>About Blake's Board Shop</title>

<p>Blake's Board Shop makes high quality, made in Wisconsin skateboard decks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop. </p></div>
        </div>
      </div>
   
<div class="image">
<img id= "aboutimage" src="assets/img/bbs1.png" width="144" height="126">
</div>
<title>About Blake's Board Shop</title>

<p>Blake's Board Shop makes high quality, made in Wisconsin skateboard decks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop. </p></div>
<?php
require_once('includes/footer.php');
?>
    </body>
  </html>
