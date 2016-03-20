<?php 
require_once 'includes/session.php';
require_once 'includes/database.php';
require_once 'includes/crud.php';
 error_reporting(E_ALL);
 setlocale(LC_MONETARY, 'en_US');

?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

 <body id="background">
	  <?php 
	     if ($admin) {
	      require_once'includes/adminNavbar.php';
	    } else {
	      require_once'includes/navbar.php';
	    }
      ?>
    <div class="container">
	    <div class="row">
	      <h3 style="margin-top: 100px">Cart</h3>
	    </div>
	    <div class="row">
		    <div class="span12">
			    <?php
				  if(isset($_GET['message'])){
					  ?>
					  <h3><?php echo $_GET['message']; ?></h3>
					  <?php
				  }  
				?>
		    </div>
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
					<td><?php echo $product_details['product_name']; ?></td>
					<td><?php echo money_format('%i', $product_details['price']); ?></td>
					<td>
						<?php echo $row['quantity']; ?>
						<a class="btn btn-default" style="margin-left: 30px" href="updateQuantity.php?type=more&id=<?php echo $product_details['id']; ?>">+</a>
						<a class="btn btn-default" href="updateQuantity.php?type=less&id=<?php echo $product_details['id']; ?>">-</a>
					<td><?php echo money_format('%i', $subtotal_product); ?>
					<td><a class="btn btn-danger" href="removeProductCart.php?id=<?php echo $product_details['id']; ?>">Remove product</a></td>
					
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
		           <td><strong><?php echo money_format('%i', $subtotal); ?></strong></td>
		           <td></td>
	            </tr>
	            <tr>
		           <td></td>
		           <td></td>
		           <td><strong>Tax</strong></td>
		           <td><strong><?php echo money_format('%i', $tax); ?></strong></td>
		           <td></td>
	            </tr>
	           <tr>
		           <td></td>
		           <td></td>
		           <td><strong>Total</strong></td>
		           <td><strong><?php echo money_format('%i', $total); ?></strong></td>
		           <td></td>
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
  </body>
</html>