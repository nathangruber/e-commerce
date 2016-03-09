<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  $pdo = Database::connect();

    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
      $cardnumberError = null;
      $expiration_dateError = null;
      $security_codeError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $cardnumber = $_POST['cardnumber'];
      $expiration_date = $_POST['expiration_date'];
      $security_code = $_POST['security_code'];
      $address_fk = $_POST['address_fk'];
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Name as it appears on card)';
        $valid = false;
      }
      if (empty($cardnumber)) {
        $cardnumberError = 'Please enter Card Number';
        $valid = false;
      }
      if (empty($expiration_date)) {
        $expiration_dateError = 'Please enter Expiration Date';
        $valid = false;
      }
      if (empty($security_code)) {
        $security_codeError = 'Please enter CVV Code (3 digit code found on back of card)';
        $valid = false;
      }
         
      if ($valid) {
        //try {
         
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO creditcard (name,cardnumber,expiration_date,security_code,address_fk) values(?, ?, ?, ?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$cardnumber,$expiration_date,$security_code,$address_fk));
          $ccID = $pdo->lastInsertId();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO customer_creditcard (creditcard_fk,customer_fk) values(?,?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($ccID, $_SESSION['id']));
          header("Location: update.php");
        //} catch (PDOException $e) {
         // echo $e->getMessage();
        //}
      }
    }
?>



<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title>Add a Credit Card</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Complete all fields to add credit cards</h3>
        </div>           
        <form class="form-horizontal" action="cccreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name as it appears on Card</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Name as it appears on Card" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($cardnumberError)?'error':'';?>">
            <label class="control-label">Credit Card Number</label>
            <div class="controls">
              <input name="cardnumber" type="text" placeholder="Credit Card Number" value="<?php echo !empty($card_number)?$cardnumber:'';?>">
              <?php if (!empty($cardnumberError)): ?>
                <span class="help-inline"><?php echo $cardnumberError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($expiration_dateError)?'error':'';?>">
            <label class="control-label">Expiration Date</label>
            <div class="controls">
              <input name="expiration_date" type="text" placeholder="Expiration Date" value="<?php echo !empty($expiration_date)?$expiration_date:'';?>">
              <?php if (!empty($expiration_dateError)): ?>
                <span class="help-inline"><?php echo $expiration_dateError;?></span>
              <?php endif;?>
            </div>
          </div>

          <div class="control-group <?php echo !empty($security_codeError)?'error':'';?>">
            <label class="control-label">CVV Code</label>
            <div class="controls">
              <input name="security_code" type="text" placeholder="CVV Code" value="<?php echo !empty($security_code)?$security_code:'';?>">
              <?php if (!empty($security_codeError)): ?>
                <span class="help-inline"><?php echo $security_codeError;?></span>
              <?php endif;?>
            </div>
          </div>

          <br>

          <?php
            try {
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT `address`.`id`, `address`.`street1` FROM `address` LEFT JOIN `customer_address` ON `address`.`id`=`customer_address`.`address_fk` WHERE (`customer_address`.`customer_fk` = ". $_SESSION['id'] . ")";
              $address = $pdo->query($sql);
              echo "<select name='address_fk'>";
              foreach ($address as $row) {
                echo "<option value='" . $row['id'] . "'>" . $row['street1'] . "</option>";
              }
              echo "</select>";
            } catch (PDOException $e) {
              echo $e->getMessage();
            }
          ?>

          <br>
          <br>
          <br>
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Add Credit Card</button>
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