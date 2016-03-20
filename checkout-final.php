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
        	<div class="span12">
	        	<h1 style="margin-top: 100px">Thank you !!</h1>
	        	
	        	<?php
		        	$address_fk = $_POST['address_fk'];
		        	$credit_card_fk = $_POST['credit_card_fk'];
		        	
		        	$address = new customerAddress($_SESSION['id']);
		        	$the_address=$address->readAnAddress($address_fk);
		        	
		        	print_r($the_address);
		        	
		        	echo 'Your transaction will be sent to'.$the_address['street_1'].' bla bla bla '.$the_address['street_2'];
		        	
		        	
		        		
		        ?>
	        	
        	</div>          
        </div>
      
    </div><!-- /container -->
    <?php
    require_once('includes/footer.php');
    Database::disconnect();
    ?>
</body>
</html>
