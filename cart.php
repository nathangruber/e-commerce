<?php 
require_once 'includes/session.php';
require_once 'includes/database.php';
require_once 'includes/crud.php';
 error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

 <body id="background">
	  <?php 
	     if ($admin) {
	       require_once'includes/adminNavBar.php';
	     } else {
	       require_once'includes/navbar.php';
	     }
      ?>
    <div class="container">
	    <div class="row">
	      <h3 style="margin-top: 100px">Cart</h3>
	    </div>
	    <div class="row">
	      <table class="table table-bordered">
	        <thead>
	          <tr>
	            <th>Name</th>
	            <th>Unit Price</th>
	            <th>Quantity</th>
	            <th>Price</th>
	            <th>Action</th>
	          </tr>
	        </thead>
	         <tbody>
	          <?php
	          if($logged) {
				$cart = new cart($_SESSION['id']);				
				$products = $cart->read();
				foreach ($products as $row) {
					
					$product = new product($row['product_fk']);
					$product_details = $product->read();
					
					$subtotal_product = $row['quantity']*$product_details['price'];
					
					$subtotal = $subtotal + $subtotal_product;
					
					
					
					
				?>
				
				<tr>
					<td><?php echo $product_details['product_details']; ?></td>
					<td>$<?php echo $product_details['price']; ?></td>
					<td><?php echo $row['quantity']; ?><a class="btn btn-default" style="margin-left: 30px" href="updateQuantity.php?type=more">+</a><a class="btn btn-default" href="updateQuantity.php?type=less">-</a></td>
					<td>$<?php echo $subtotal_product; ?></td>
					<td><a class="btn btn-danger" href="removeItem.php">Remove item</a></td>
					
				</tr>
				
				
				
				<?php
	            }
	            
	            $tax = $subtotal*0.056;
	            $total = $tax + $subtotal;
	            
	            ?>
	            
	            <tr>
		           <td></td>
		           <td></td>
		           <td><strong>Subtotal</strong></td>
		           <td><strong><?php echo $subtotal; ?></strong></td> 
	            </tr>
	            <tr>
		           <td></td>
		           <td></td>
		           <td><strong>Tax</strong></td>
		           <td><strong><?php echo $tax; ?></strong></td> 
	            </tr>
	           <tr>
		           <td></td>
		           <td></td>
		           <td><strong>Total</strong></td>
		           <td><strong><?php echo $total; ?></strong></td> 
	            </tr>
	           <?php 
		      } 
	          ?>
	         </tbody>
	      </table>
	      <br>
	      <?php
	      ?>
	    </div>
        <div>
          <a href="checkout.php">Checkout</a>
        </div>
        <br>
        <br>

        <div>
          <a href="index.php">Return to Index</a>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   //Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>