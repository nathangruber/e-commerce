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
      <p>Update Your Information</p>
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
<div class="container">
    <div class="row">
     
      <p>Please Add Or Update Your Address</p>
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
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM customer WHERE id = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($_SESSION["id"]));
              $query = $q->fetch(PDO::FETCH_ASSOC);

echo '<tr>';
echo '<form method="POST" action="userupdate.php">';
echo '<td><input type="text" name="street_1" value="'.$query['street_1'].'"></td>';
echo '<td><input type="text" name="street_2" value="'.$query['street_2'].'"></td>';
echo '<td><input type="text" name="city" value="'.$query['city'].'"></td>';
echo '<td><input type="text" name="state" value="'.$query['state'].'"></td>';
echo '<td><input type="submit" value="Update"></td>';
echo '</form>';
echo '</tr>';
}
Database::disconnect();
?>
<div class="container">
    <div class="row">
      
     
    </div>
    <div class="row">
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
          if($logged) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM creditcard WHERE id = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($_SESSION["id"]));
              $query = $q->fetch(PDO::FETCH_ASSOC);

echo '<tr>';
echo '<form method="POST" action="userupdate.php">';
echo '<td><input type="text" name="name" value="'.$query['name'].'"></td>';
echo '<td><input type="text" name="cardnumber" value="'.$query['cardnumber'].'"></td>';
echo '<td><input type="text" name="expiration_date" value="'.$query['expiration_date'].'"></td>';
echo '<td><input type="text" name="security_code" value="'.$query['security_code'].'"></td>';
echo '<td><input type="submit" value="Update"></td>';
echo '</form>';
echo '</tr>';
}
Database::disconnect();
?>
</body>
</html>
