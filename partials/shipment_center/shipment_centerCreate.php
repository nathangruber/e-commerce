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
      $address_fk = $_POST['address_fk'];
         
        // validate input
      $valid = true;
        
      if (empty($name)) {
        $nameError = 'Please enter Shipment Center Name';
        $valid = false;
      }
         
        // insert data
      if ($valid) {
        try {
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO shipment_center (name,address_fk) values(?, ?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($name,$address_fk));
          Database::disconnect();
          header("Location: adminUpdate.php");
        } catch (PDOException $e) {
          echo $e->getMessage();
          die();
        }
      }
    }
?>



<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
   
   <body>
    <?php 
      if ($admin) {
        require_once'includes/adminNavbar.php';
      } else {
        require_once'includes/navbar.php';
      }
    ?>
 
     <div class="container">
       <div class="span10 offset1">
         <div class="row">
           <h3>Create a Shipment Center.</h3>
         </div>           
         <form class="form-horizontal" action="shipmentcreate.php" method="post"> 
 
           <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
             <label class="control-label">Shipment Center Name</label>
             <div class="controls">
               <input name="name" type="text" placeholder="Shipment Center Name" value="<?php echo !empty($name)?$name:'';?>">
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
               $sql = "SELECT `address`.`id`, `address`.`street_1` FROM `address` ORDER BY `street_1`";
               $address = $pdo->query($sql);
               echo "Please Select Address";
               echo "<br>";
               echo "<select name='address_fk'>";
               foreach ($address as $row) {
                 echo "<option value='" . $row['id'] . "'>" . $row['street_1'] . "</option>";
               }
               echo "</select>";
               Database::disconnect();
             } catch (PDOException $e) {
               echo $e->getMessage();
               Database::disconnect();
             }
           ?>
           <br>
           <br>                        
           <div class="form-actions">
             <button type="submit" class="btn btn-success">Add Shipment Center</button>
           </div>
         </form>
       </div>
     </div>
  
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
 
  </body>
 </html>
<?php require_once('includes/footer.php');?>
