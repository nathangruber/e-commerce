<?php 
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
 error_reporting(E_ALL);
 Database::connect();
?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

 <body>
	  <?php 
	     if ($admin) {
	       require_once'includes/adminNavBar.php';
	     } else {
	       require_once'includes/navbar.php';
	     }
      ?>
    <div class="container">
	    <div class="row">
		    <h1 style="margin-top: 50px">Checkout</h1>
	        <h3>Verify Shipping Information</h3>
	        <h4>Personal Information:</h4>
				<?php
					$customer = new customer();
					$cust = $customer->read($_SESSION['id']);
				    
				    echo '<form method="POST" action="placeOrderfunction.php">';
				    echo '<input type="hidden" name="id" value="' . $cust['id'] . '">';
				    echo ''.$cust['name'].'';
				    echo '&nbsp;'; 
				    echo '<br>';
				    echo ''.$cust['phone_number'].'';
				    echo '<br>';
				    echo ''.$cust['email_address'].'';
				?>
			<h4 style="margin-top: 100px">Select Shipping Address</h4>
	      	<p>If you need to add a new address, please do so <a href="addycreate.php">here</a>.</p>
		    	<?php
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT `address`.`id`, `address`.`street_1` FROM `address` WHERE `address`.`id` IN (SELECT `address`.`customer_fk` FROM `address` WHERE `address`.`customer_fk` = ?) ORDER BY `address`.`street_1`";
					$q = $pdo->prepare($sql);
					$q->execute(array($_SESSION['id']));
					$address = $q->fetchAll(PDO::FETCH_ASSOC);
					echo "<select method='POST' name='address_fk'>";
					foreach ($address as $row) {
					 echo "<option value='" . $row['id'] . "'>" . $row['street_1'] . "</option>";
					}
					echo "</select>";
		        ?>
			<br>
			<br>
			<br>
	        <h4>Select Credit Card</h4>
			<p>If you need to add a new address, please do so <a href="cccreate.php">here</a>.</p>
		    	<?php
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//$sql = "SELECT `creditcard`.`id`, `creditcard`.`cardnumber` FROM `creditcard` WHERE `creditcard`.`id` IN (SELECT `customer_credit_card`.`creditcard_fk` FROM `customer_credit_card` WHERE `customer_credit_card`.`customer_fk` = ?) ORDER BY `credit_card`.`card_number`";
					$q = $pdo->prepare($sql);
					$q->execute(array($_SESSION['id']));
					$address = $q->fetchAll(PDO::FETCH_ASSOC);
					echo "<select method='POST' name='creditcard_fk'>";
					foreach ($address as $row) {
					 echo "<option value='" . $row['id'] . "'>" . $row['cardnumber'] . "</option>";
					}
					echo "</select>";
		        ?>
			<br>
			<br>
			<br>
		    	<?php
		    		echo '<input type="submit" value="Place Order">';
		    		echo '</form';
		    	?>
	    </div>
 		<br>
        <br>
		<div>
          <a href="cart.php" input type="submit" value="Cart">Return to Cart</a>
        </div>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>