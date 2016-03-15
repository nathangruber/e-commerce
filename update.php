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
<?php 
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    error_reporting(E_ALL);
  ?>

  <div class="container">

    <div class="row">
      <h3>Update User Information</h3>
    </div>
    <?php
    if(isset($_GET['feedback'])){
      if($_GET['feedback']=='ok'){
        echo 'Your information was updated successfully!';
      }else{
        echo 'Please check fields and try again.';
      }
    }
    if(isset($_GET['feedbackdeleted'])){
      if($_GET['feedbackdeleted']=='ok'){
        echo 'Your information was deleted successfully!';
      }else{
        echo 'Please check fields and try again.';
      }
    }

    if(isset($_GET['feedbackcreditcardadded'])){
      if($_GET['feedbackcreditcardadded']=='ok'){
        echo 'Your credit card was added successfully!';
      }else{
        echo 'Please check fields and try again.';
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
                echo '<td><input class="btn btn-default" type="submit" value="Update"></td>';
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
                echo '<td><input class="btn btn-default" type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="addydelete.php">';
                echo '<input type="hidden" name="addy_id" value="'.$address['id'].'">';
                echo '<td><input class="btn btn-danger" type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';

              }

          
          ?>
        </tbody>
      </table>
    </div>

    <div class="row">
        <div class="span12">
          <a class="btn btn-default" href="cccreate.php">Add new credit card</a>
        </div>
        
      </div>

    <div class="row">
     

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Credit Card Number</th>
            <th>Expiration Date</th>
            <th>Security Code</th>
            <th>Address</th>
            <th>Update</th>
            <th>Delete</th>
         </tr>
        </thead>
        <tbody>
          <?php
            $myCreditCards = new customerCreditcards($_SESSION['id']);
            foreach ($myCreditCards->read() as $creditcard) {
            
            echo '<tr>';
            echo '<form method="POST" action="ccupdate.php">';
            echo '<input type="hidden" name="creditcard_id" value="'.$creditcard['id'].'">';
            echo '<td><input type="text" name="name" value="'.$creditcard['name'].'"></td>';
            echo '<td><input type="text" name="cardnumber" value="'.$creditcard['cardnumber'].'"></td>';
            echo '<td><input type="text" name="expiration_date" value="'.$creditcard['expiration_date'].'"></td>';
            echo '<td><input type="text" name="security_code" value="'.$creditcard['security_code'].'"></td>';
            echo '<td>';
            ?>
              <select name='address_fk'>
                <?php
                  $myAddresses = new customerAddress($_SESSION['id']);
                  foreach ($myAddresses->read() as $address) {
                    echo "<option value='" . $address['id'] . "'";
                    
                    if($address['id']==$creditcard['address_fk']){
                      echo 'selected';
                    }
                    
                    echo ">" . $address['street_1'] . "</option>";
                  }
                ?>
              </select>
            <?php 
            echo '</td>';
            echo '<td><input class="btn btn-default" type="submit" value="Update"></td>';
            echo '</form>';
            
            echo '<form method="POST" action="ccdelete.php">';
            echo '<input type="hidden" name="creditcard_id" value="'.$creditcard['id'].'">';
            echo '<td><input class="btn btn-danger" type="submit" value="Delete"></td>';
            echo '</form>';
            echo '</tr>';

          }

         
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
