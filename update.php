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
              $me = new customer();
              $myInfo = $me->read($_SESSION["id"]);

              if(!empty($myInfo)){
                echo '<tr>';
                echo '<form method="POST" action="userupdate.php">';
                echo '<td><input type="text" name="name" value="'.$myInfo['name'].'"></td>';
                echo '<td><input type="text" name="birth_date" value="'.$myInfo['birth_date'].'"></td>';
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


  </div>




</body>
</html>
