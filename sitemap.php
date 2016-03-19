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
  <img id="siteimage" src="assets/img/bbs1.png" alt="Banner Image" width="300">
     </header> 


  </head>


  <body>
    

   
  <div class="container">
    <div class="row">
       <div class="col-md-4">
         <h2>Site Map</h2>
        
<p><a href="index.php">Home Page</a></p>
<ul>
  <li> Introduction to Blake's Board Shop</li>
 </ul>
 <p><a href="category.php">Our Boards</a></p>
<ul>
  <li>Blake's Skateboard Decks</li>
  <li>Blake's Cruiser Decks</li>
  <li>Hardware</li>
</ul>      
<p><a href="register.php">Register</a></p>
<ul>
  <li> Register</li>
</ul>
<p><a href="loginpage.php">Login</a></p>
<ul>
  <li> Login</li>
</ul>
<p><a href="about.php">About Blake's</a></p>
<ul>
  <li> Blake's Board Shop's Mission</li>
  </ul>
  <p><a href="contact.php">Contact Us</a></p>
<ul>
  <li> Email Form</li>
</ul>
<p><a href="cart.php">Cart</a></p>
<ul>
  <li> Your Cart</li>
</ul>
       </div>
       </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   

<?php
require_once 'includes/footer.php';
?> 
  </body>
</html>
