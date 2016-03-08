<?php require_once('includes/session.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>

  <?php 
    require_once('includes/navbar.php');
    require_once('includes/database.php');
    error_reporting(E_ALL);
  ?>

  <div class="container">
    <div class="row">
      <h3>Update Your Information</h3>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Update</th>
         </tr>
        </thead>
        <tbody>
          <?php
          if($logged) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM customer WHERE id = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($_SESSION["id"]));
              $query = $q->fetch(PDO::FETCH_ASSOC);

echo '<tr>';
echo '<form method="POST" action="userupdate.php">';
echo '<td><input type="text" name="name" value="'.$query['name'].'"></td>';
echo '<td><input type="text" name="birth_date" value="'.$query['birth_date'].'"></td>';
echo '<td><input type="text" name="phone_number" value="'.$query['phone_number'].'"></td>';
echo '<td><input type="text" name="email_address" value="'.$query['email_address'].'"></td>';
echo '<td><input type="submit" value="Update"></td>';
echo '</form>';
echo '</tr>';
}
Database::disconnect();
?>
<div class="row">
      <h3>Update Address</h3>
    </div>
    <div>
      <p>If you have not registered an address with your account, please <a href="addressCreate.php">Create an Address</a>.</p>
      <p>Please make updates to your existing addresses below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Street Number</th>
            <th>Street Number (continued)</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Country</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($loggedin) {
            //try {
              $pdo = Database::connect();
              $id = $_SESSION['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?)';
              $q = $pdo->prepare($sql);
              $q->execute(array($id));
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
            //} catch (PDOException $e) {
            //  echo $e->getMessage();
            //}
            //die();
            
            foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="addressUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="street1" value="'.$row['street1'].'"></td>'; 
                echo '<td><input type="text" name="street2" value="'.$row['street2'].'"></td>';
                echo '<td><input type="text" name="city" value="'.$row['city'].'"></td>';
                echo '<td><input type="text" name="state" value="'.$row['state'].'"></td>';
                echo '<td><input type="text" name="zip" value="'.$row['zip'].'"></td>';
                echo '<td><input type="text" name="country" value="'.$row['country'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="addressDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          Database::disconnect();
              //print_r($query);
          ?>
        </tbody>
      </table>
    </div>


    <div class="row">
      <h3>Update Credit Card Information</h3>
    </div>
    <div>
      <p>If you have not registered a credit card with your account, please <a href="ccCreate.php">add a credit card</a>.</p>
      <p>Please make updates to your existing credit cards below.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Type</th>
            <th>Name on Card</th>
            <th>Card Number</th>
            <th>Expiration Date</th>
            <th>CVV Code</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($loggedin) {
            //try {
              $pdo = Database::connect();
              $id = $_SESSION['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM credit_card WHERE id IN (SELECT creditcard_fk FROM customer_credit_card WHERE customer_fk = ?)';
              $q = $pdo->prepare($sql);
              $q->execute(array($id));
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
            //} catch (PDOException $e) {
            //  echo $e->getMessage();
            //}
            //die();
            
            foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="ccUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="type" value="'.$row['type'].'"></td>'; 
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>';
                echo '<td><input type="text" name="card_number" value="'.$row['card_number'].'"></td>';
                echo '<td><input type="text" name="expiration" value="'.$row['expiration'].'"></td>';
                echo '<td><input type="text" name="security" value="'.$row['security'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="ccDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          Database::disconnect();
              //print_r($query);
          ?>
        </tbody>
      </table>
    </div>

    <div>
      <a href="index.php">Return to Index</a>
    </div>
    <br>
    <br>
    <br>
    <br>
  </div> <!-- /container -->

  <?php require_once('includes/footer.php');?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

        </tbody>
      </table>
    </div>
    <div>
      <a href="index.php">Return to Login Page</a>
    </div>
  </div> <!-- /container -->

  <?php require_once('includes/footer.php');?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
  </html>