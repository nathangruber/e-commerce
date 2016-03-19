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

  
     

  <body>

    <div class="container">
        <div class = "row">
         <div class="col-md-4">
    <div>    
    <img id= 'contactlogo' src="assets/img/bbs1.png" alt="Blake's Board Shop Logo" width="350">
  </div> 
         <h2></h2>
<div class = "contactus">       
<p>Contact Us</p> 
</div>      
    
<form name="contactform" method="post" action="emailform.php">
 
 
  <label for="first_name">First Name *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
 
 
  <input  type="text" name="first_name" maxlength="45" size="30">
 
 
  <label for="last_name">Last Name *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
 
 
  <input  type="text" name="last_name" maxlength="45" size="30">
 
 
  <label for="email">Email Address *</label>
 
 
  <input  type="text" name="email" maxlength="45" size="30">
 
 
  <label for="telephone">Phone Number*</label>
 
  <input  type="text" name="telephone" maxlength="30" size="30">
 
  <label for="comments">Comments *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
 
  <textarea  name="comments" maxlength="1000" cols="30" rows="5"></textarea>
 
  <input type="submit" value="Submit">  

 
</form>
        </div>
      </div>
     </div> 

<?php
require_once('includes/footer.php');
?>

   
  </body>
</html>