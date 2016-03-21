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

<head>
    <title></title>
</head>

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
            <h1 style="margin-top: 100px">Checkout</h1>

            <h4>Personal Information:</h4><?php
            $customer = new customer();
            $cust = $customer->read($_SESSION['id']);

            echo ''.$cust['name'].'';
            echo '&nbsp;';
            echo '<br>';
            echo ''.$cust['phone_number'].'';
            echo '<br>';
            echo ''.$cust['email_address'].'';
            ?>
			
			<form class="form-horizontal" action="checkout-final.php" method="post">
            <h4 style="margin-top: 100px">Select Shipping Address</h4>

            
                <div class="control-group">
                    <label class="control-label">Address</label>
					
					<?php
						$myAddresses = new customerAddress($_SESSION['id']);
						$num_of_address=$myAddresses->getNumOfAddress();
						if($num_of_address>0){
					?>
					
					
					
                    <div class="controls">
                        <select name='address_fk'>
                            <?php
                            foreach ($myAddresses->read() as $address) {
                                echo "<option value='" . $address['id'] . "'>" . $address['street_1'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
	                  	}else{
		                ?>
		                <br>You do not have an address, please add one. <a href="addycreate.php" class="btn btn-link">Add Address</a>
		                <?php
	                  	}
	                ?>
                </div>
            

            

            <h4>Select Credit Card</h4>
				<div class="control-group">
                    <label class="control-label">Credit card</label>
					
					<?php
						$mycc = new customerCreditcards($_SESSION['id']);
						$allcreditcards=$mycc->read();
						
						
						$num_cc=count($allcreditcards);
						
						
						if($num_cc>0){
					?>
					
					<div class="controls">
                        <select name='credit_card_fk'>
                            <?php
                            foreach ($mycc->read() as $cc) {
                                echo "<option value='" . $cc['id'] . "'>" . $cc['cardnumber'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
	                  	}else{
		                ?>
		                <br>You do not have a credit card, please add one. <a href="cccreate.php" class="btn btn-link">Add Credit Card</a>
		                <?php
	                  	}
	                ?>
                </div>
                
                <?php
	                
	            	if(($num_cc>0)&&($num_of_address>0)){
		        ?>
		        		<input style="margin-top: 50px" type="submit" class="btn btn-info" value="Pay"/>
		       	<?php   	
	            	}else{
		        ?>
		        		<input style="margin-top: 50px"  type="submit" class="btn btn-info" disabled="" value="Pay"/>
		        <?php    	
	            	}
	            ?>  
	               	
                
                
                
            </form>
            
            
        </div><br>
      
    </div><!-- /container -->
    <?php
    require_once('includes/footer.php');
    Database::disconnect();
    ?>
</body>
</html>
