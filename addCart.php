<?php 
require_once 'includes/session.php';



//Add it to the cart

$product_id = $_GET['id'];

$cart = new cart($_SESSION['id']);
$cart->addCart($product_id);

 
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once'includes/header.php'; ?>
 <body>
<?php  require_once'includes/navbar.php'; ?>
<br><br><br><br><br><br>
  
 <div class="container">
      
      <div class="row">
        
        <div class="span12">
	        bla bla bla
        </div>
        
      </div>

      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->


<?php require_once('includes/footer.php');?>
  </body>
</html>