<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    if ( !empty($_POST)) {
        // keep track validation errors
      $nameError = null;
         
        // keep track post values
      $name = $_POST['name'];
      $shipment_center_fk = $_POST['shipment_center_fk'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Bin Name';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO bin (name, shipment_center_fk) values(?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$shipment_center_fk));
          Database::disconnect();
          header("Location: adminUpdate.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }
    }
?>



<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
    <title>Create Bin</title>
 </head>
  
  <body>
    <?php require_once('includes/navbar.php');?>


    <div class="container">
      <div class="span10 offset1">
        <div class="row">
          <h3>Bin Name.</h3>
        </div>           
        <form class="form-horizontal" action="binCreate.php" method="post"> 

          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Bin Name</label>
            <div class="controls">
              <input name="name" type="text" placeholder="Bin Name" value="<?php echo !empty($name)?$name:'';?>">
              <?php if (!empty($nameError)): ?>
                <span class="help-inline"><?php echo $nameError;?></span>
              <?php endif;?>
            </div>
          </div>

          <br>

          <?php
            try {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT `shipment_center`.`id`, `shipment_center`.`name` FROM `shipment_center` ORDER BY `name` ASC";
              $address = $pdo->query($sql);
              echo "Please choose a Shipment Center.";
              echo "<br>";
              echo "<select name='shipment_center_fk'>";
              foreach ($address as $row) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
              echo "</select>";
              Database::disconnect();
            } catch (PDOException $e) {
              echo $e->getMessage();
              Database::disconnect();
            }
          ?>
                        
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Create Bin</button>
          </div>
        </form>
      </div>
    </div>

    <?php require_once('includes/footer.php');?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
 </body>
</html>