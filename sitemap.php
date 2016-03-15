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
    <title>Site Map</title>
  <header class="main-header" role="banner">
  <img src="assets/img/bbs1.png" alt="Banner Image" width="300">
     </header> 


  </head>


  <body>
    

   
  <div class="container">
    <div class="row">
       <div class="col-md-4">
         <h2>Site Map</h2>
        
<p><a href="index.php">Home Page</a></p>
<ul>
  <li> Introduction to Blake's Butcher Shop</li>
  <li> Photos</li>
 </ul>
<p><a href="register.php">Register</a></p>
<ul>
  <li> Register</li>
</ul>
 <p><a href="product.php">Our Boards</a></p>
<ul>
  <li>Skateboards</li>
  <li>Longboards</li>
  <li>Hardware</li>
</ul>      
<p><a href="about.php">About Blake's</a></p>
<ul>
  <li> Meet Blake's Board Shop</li>
  <li> Photo</li>
  </ul>
  <p><a href="contact.php">Contact Us</a></p>
<ul>
  <li> Email Form</li>
</ul>
       </div>
       </div>

   
<center>
      <p><small>'&copy; 2016 Blake's Board Shop'</small></p>
</center>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   

   
  </body>
</html>
<?php
require_once 'includes/footer.php';
?>