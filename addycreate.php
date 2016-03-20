<?php
require_once('includes/session.php');
if(!$logged){
    header("Location: index.php");
    die(); // just in case
}
require_once('includes/database.php');
require_once('includes/crud.php');


if(!empty($_POST)){

    // keep track validation errors
    $street_1Error = null;
    $street_2Error = null;
    $cityError = null;
    $stateError = null;
    $zip_codeError = null;

    // keep track post values
    $street_1 = $_POST['street_1'];
    $street_2 = $_POST['street_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];



    // validate input
    $valid = true;

    if (empty($street_1)) {
        $street_1Error = 'Please enter your Street Number';
        $valid = false;
    }
    if (empty($street_2)) {
        $street_2Error = 'Please enter your Street Number';
        $valid = false;
    }
    if (empty($city)) {
        $cityError = 'Please enter your City';
        $valid = false;
    }
    if (empty($state)) {
        $stateError = 'Please enter your State';
        $valid = false;
    }
    if (empty($zip_code)) {
        $zip_codeError = 'Please enter your Zip Code';
        $valid = false;
    }



    if($valid){


        $customeraddress = new customerAddress($_SESSION['id']);
        $response = $customeraddress->create($street_1, $street_2, $city, $state, $zip_code);
        if($response){
            header('Location: update.php');
        }else{
            echo 'error';
        }
    }
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html lang="en">
<?php require_once 'includes/header.php';?>

<head>
    <title>Register</title>
</head>

<body>
    <?php require_once('includes/navbar.php');?>

    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Please fill out all fields to create an address.</h3>
            </div>

            <form class="form-horizontal" action="addycreate.php" method="post">
                <div class="control-group &lt;?php echo !empty($street_1Error)?'error':'';?&gt;">
                    <label class="control-label">Street Number</label>

                    <div class="controls">
                        <input name="street_1" type="text" placeholder="Street Number" value="<?php echo !empty($street_1)?$street_1:'';?>"> <?php if (!empty($street_1Error)): ?> <span class="help-inline"><?php echo $street_1Error;?></span> <?php endif;?>
                    </div>
                </div>

                <div class="control-group &lt;?php echo !empty($street_2Error)?'error':'';?&gt;">
                    <label class="control-label">Street Number</label>

                    <div class="controls">
                        <input name="street_2" type="text" placeholder="Street Number" value="<?php echo !empty($street_2)?$street_2:'';?>"> <?php if (!empty($street_2Error)): ?> <span class="help-inline"><?php echo $street_2Error;?></span> <?php endif;?>
                    </div>
                </div>

                <div class="control-group &lt;?php echo !empty($cityError)?'error':'';?&gt;">
                    <label class="control-label">City</label>

                    <div class="controls">
                        <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>"> <?php if (!empty($cityError)): ?> <span class="help-inline"><?php echo $cityError;?></span> <?php endif;?>
                    </div>
                </div>

                <div class="control-group &lt;?php echo !empty($stateError)?'error':'';?&gt;">
                    <label class="control-label">State</label>

                    <div class="controls">
                        <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>"> <?php if (!empty($stateError)): ?> <span class="help-inline"><?php echo $stateError;?></span> <?php endif;?>
                    </div>
                </div>

                <div class="control-group &lt;?php echo !empty($zip_codeError)?'error':'';?&gt;">
                    <label class="control-label">Zip Code</label>

                    <div class="controls">
                        <input name="zip_code" type="text" placeholder="Zip Code" value="<?php echo !empty($zip_code)?$zip_code:'';?>"> <?php if (!empty($zip_codeError)): ?> <span class="help-inline"><?php echo $zip_codeError;?></span> <?php endif;?>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Add Address</button> <a class="btn" href="update.php">Back</a>
                </div>
            </form>
        </div>
    </div><?php require_once('includes/footer.php');?>
</body>
</html>
