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
	            <th>Price</th>
	            <th>Quantity</th>
	            <th>Subtotal</th>
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
				?>
				
				<tr>
					<td><?php echo $product_details['product_details']; ?></td>
					<td>$<?php echo $product_details['price']; ?></td>
					<td><?php echo $row['quantity']; ?><a class="btn btn-default" href="updateQuantity.php?type=more">+</a><a class="btn btn-default" href="updateQuantity.php?type=less">-</a></td>
					<td><a class="btn btn-danger" href="removeItem.php">Remove item</a></td>
					<td>$<?php echo $row['quantity']*$product_details['price']; ?></td>
				</tr>
				<?php
	            }
	            echo '<br>';
                echo '<tr>';
                echo '<th>Subtotal</th>';
                echo '<th>Tax</th>';
                echo '</tr>';
                echo '<tr>';
                $cost = $cost + (($row['price']) * ($row['quantity']));
                echo '<td>' . $cost . '</td>';
                $tax = ($cost * .056);
                echo '<td>' . $tax . '</td>';
                echo '</tr>';
                echo '<br>';
                echo '<tr>';
                echo '<th>Total:</th>';
                echo '<th>' . ($cost + $tax) . '</th>';
                echo '</tr>';
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