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