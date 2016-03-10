<?php
public class customerAddress {  


  public $customer_id = NULL;

  public function __construct($customer_id){
    $this->customer_id = $customer_id;
  }

  public function create($street_1, $street_2, $city, $state, $zip_code){
    if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code)) {
      return false;
    } else {

      $pdo = Database::connect();
      $sql = "INSERT INTO address (street_1,street_2,city,state,zip_code) values(?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($street_one,$street_two,$city,$state,$zip_code));
      $address_id = $pdo->lastInsertId();

      $sql = "INSERT INTO customer_address (address_fk, customer_fk) values(?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($address_id, $this->customer_id)); 

      Database::disconnect();
      return true;
    }
  }

  public function read(){
    try{
      $pdo = Database::connect();
      $sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?) ORDER BY id DESC';
      $q = $pdo->prepare($sql);
      $q->execute(array($this->customer_id));
      $data = $q->fetchAll(PDO::FETCH_ASSOC);
          Database::disconnect();
          return $data;
    } catch (PDOException $error){

      header( "Location: 500.php" );
      //echo $error->getMessage();
      die();

    }

    }

?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

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

          <div class="control-group <?php echo !empty($street_1Error)?'error':'';?>">
            <label class="control-label">Street Number</label>
            <div class="controls">
              <input name="street_1" type="text" placeholder="Street Number" value="<?php echo !empty($street_1)?$street_1:'';?>">
              <?php if (!empty($street_1Error)): ?>
                <span class="help-inline"><?php echo $street_1Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($street_2Error)?'error':'';?>">
            <label class="control-label">Street Number</label>
            <div class="controls">
              <input name="street_2" type="text" placeholder="Street Number" value="<?php echo !empty($street_2)?$street_2:'';?>">
              <?php if (!empty($street_2Error)): ?>
                <span class="help-inline"><?php echo $street_2Error;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($cityError)?'error':'';?>">
            <label class="control-label">City</label>
            <div class="controls">
              <input name="city" type="text" placeholder="City" value="<?php echo !empty($city)?$city:'';?>">
              <?php if (!empty($cityError)): ?>
                <span class="help-inline"><?php echo $cityError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($stateError)?'error':'';?>">
            <label class="control-label">State</label>
            <div class="controls">
              <input name="state" type="text" placeholder="State" value="<?php echo !empty($state)?$state:'';?>">
              <?php if (!empty($stateError)): ?>
                <span class="help-inline"><?php echo $stateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($zip_codeError)?'error':'';?>">
            <label class="control-label">Zip Code</label>
            <div class="controls">
              <input name="zip_code" type="text" placeholder="Zip Code" value="<?php echo !empty($zip_code)?$zip_code:'';?>">
              <?php if (!empty($zip_codeError)): ?>
                <span class="help-inline"><?php echo $zip_codeError;?></span>
              <?php endif;?>
            </div>
          </div>

         
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Add Address</button>
            <a class="btn" href="update.php">Back</a> 
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

 </body>
</html>
<?php Database::disconnect(); ?>