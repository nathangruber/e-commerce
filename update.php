<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  $pdo = Database::connect();
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/header.php';?>
  <body>

  <?php require_once('includes/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <h3>Update User Information</h3>
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
        </div>

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
<div class="container">
    <div class="row">
     
      <p>Please Add Or Update Your User Information</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Street Address</th>
            <th>Street Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Update</th>
         </tr>
        </thead>
        <tbody>
          <?php
           if($logged) {

              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?)';
              $q = $pdo->prepare($sql);
              $q->execute(array($_SESSION["id"]));
              $query = $q->fetch(PDO::FETCH_ASSOC);
              foreach ($query as $row) {
              echo '<tr>';
              echo '<form method="POST" action="addressupdate.php">';
              echo '<td><input type="text" name="street_1" value="'.$row['street_1'].'"></td>';
              echo '<td><input type="text" name="street_2" value="'.$row['street_2'].'"></td>';
              echo '<td><input type="text" name="city" value="'.$row['city'].'"></td>';
              echo '<td><input type="text" name="state" value="'.$row['state'].'"></td>';
              echo '<td><input type="text" name="zip_code" value="'.$row['zip_code'].'"></td>';
              echo '<td><input type="submit" value="Update"></td>';
              echo '</form>';
              echo '</tr>';
            }
          }
          ?>
<div class="container">
    <div class="row">
      <?php
          if ($logged) {
            echo '<form method="POST" action="addycreate.php">';
            echo '<input type="submit" value="Add Your Address">';
            echo '</form>';
          
          } else {
            echo "You are logged out.";
          }
        ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Credit Card Number</th>
            <th>Expiration Date</th>
            <th>Security Code</th>
            <th>Update</th>
         </tr>
        </thead>
        <tbody>
          <?php
          if ($logged) {
            echo '<form method="POST" action="cccreate.php">';
            echo '<input type="submit" value="Add Credit Card">';
            echo '</form>';
          
          } else {
            echo "You are logged out.";
          }
        ?>
          <?php
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM creditcard IN (SELECT creditcard_fk FROM customer_creditcard WHERE customer_fk = ?)';
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION["id"]));
            $query = $q->fetch(PDO::FETCH_ASSOC);
            foreach ($query as $row) {
            echo '<tr>';
            echo '<form method="POST" action="ccupdate.php">';
            echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>';
            echo '<td><input type="text" name="cardnumber" value="'.$row['cardnumber'].'"></td>';
            echo '<td><input type="text" name="expiration_date" value="'.$row['expiration_date'].'"></td>';
            echo '<td><input type="text" name="security_code" value="'.$row['security_code'].'"></td>';
            echo '<td><input type="submit" value="Update"></td>';
            echo '</form>';
            echo '</tr>';
         }
          ?>
</body>
</html>
<?php Database::disconnect(); ?>