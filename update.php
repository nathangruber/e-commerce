<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');

?>
!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>

  <?php require_once('includes/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <h3>Update User Information</h3>
    </div>
    <div class="row">
      <table class="table table-bordered">
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
            ?>
          </tbody>
        </table>
      </div>
      
<div class="row">
     
        <p>Please Add Or Update Your User Information</p>
      </div>

    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Street Address</th>
            <th>Street Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Update</th>
            <th>Delete</th>
         </tr>
        </thead>
        <tbody>
          <?php
          
              $myAddresses = new customerAddress($_SESSION['id']);

              foreach ($myAddresses->read() as $address) {

                echo '<tr>';
                echo '<form method="POST" action="addyupdate.php">';
                echo '<input type="hidden" name="addy_id" value="'.$address['id'].'">';
                echo '<td><input type="text" name="street_1" value="'.$address['street_1'].'"></td>';
                echo '<td><input type="text" name="street_2" value="'.$address['street_2'].'"></td>';
                echo '<td><input type="text" name="city" value="'.$address['city'].'"></td>';
                echo '<td><input type="text" name="state" value="'.$address['state'].'"></td>';
                echo '<td><input type="text" name="zip_code" value="'.$address['zip_code'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="addydelete.php">';
                echo '<input type="hidden" name="addy_id" value="'.$address['id'].'">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';

              }

          
          ?>
        </tbody>
      </table>
    </div>



<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>

  <?php require_once('includes/navbar.php'); ?>

  <div class="container">

  </div>
</body>
</html>
