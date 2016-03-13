<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');

?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>
  <body>

  <div class="container">
   <?php require_once('includes/navbar.php'); ?>

    <div class="row">
      <h3>Update User Information</h3>
    </div>
    <?php
    if(isset($_GET['feedback'])){
      if($_GET['feedback']=='ok'){
        echo 'The information was updated successfully!';
      }else{
        echo 'Your information was not updated probably one param is empty.';
      }
    }
   ?>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Update</th>
         </tr>
        </thead>
        <tbody>

            <?php

              $me = new customer();
              $myInfo = $me->read($_SESSION["id"]);

              if(!empty($myInfo)){
                echo '<tr>';
                echo '<form method="POST" action="userupdate.php">';
                echo '<td><input type="text" name="name" value="'.$myInfo['name'].'"></td>';
                echo '<td><input type="text" name="birth_date" value="'.$myInfo['birth_date'].'"></td>';
                echo '<td><input type="text" name="gender" value="'.$myInfo['gender'].'"></td>';
                echo '<td><input type="text" name="phone_number" value="'.$myInfo['phone_number'].'"></td>';
                echo '<td><input type="text" name="email_address" value="'.$myInfo['email_address'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '</tr>';
              } else {
                echo "<p>Could not fetch customer information.</p>";
              }

            ?>

          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="span12">
          <a class="btn btn-default" href="addycreate.php">Add new address</a>
        </div>
        
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

    <div class="row">
     

      <table class="table table-bordered">
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
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT * FROM creditcard WHERE id IN (SELECT creditcard_fk FROM customer_creditcard WHERE customer_fk = ?)';
            $q = $pdo->prepare($sql);
            $q->execute(array($_SESSION["id"]));
            $query = $q->fetch(PDO::FETCH_ASSOC);
            echo '<tr>';
            echo '<form method="POST" action="ccupdate.php">';
            echo '<input type="hidden" name="creditcard_id" value="'.$query['id'].'">';
            echo '<td><input type="text" name="name" value="'.$query['name'].'"></td>';
            echo '<td><input type="text" name="cardnumber" value="'.$query['cardnumber'].'"></td>';
            echo '<td><input type="text" name="expiration_date" value="'.$query['expiration_date'].'"></td>';
            echo '<td><input type="text" name="security_code" value="'.$query['security_code'].'"></td>';
            echo '<td><input type="submit" value="Update"></td>';
            echo '</form>';
            echo '</tr>';
            echo '<form method="POST" action="ccdelete.php">';
            echo '<input type="hidden" name="creditcard_id" value="'.$query['id'].'">';
            echo '<td><input type="submit" value="Delete"></td>';
            echo '</form>';


         
          ?>
        </tbody>
      </table>
    </div>







  </div>
</body>
</html>
