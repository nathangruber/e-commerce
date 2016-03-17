<?php
require_once 'includes/session.php';
require_once 'includes/database.php';
?>

<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

  <body>
    <div class="container">
      <div class="row">
        <h3>List of all Products</h3>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Action</th>
              <th>Action</th>
            </tr>
          </thead>
           <tbody>
    
              <?php 
              if ($admin) {
                require_once'includes/adminNavBar.php';
              } else {
                require_once'includes/navbar.php';
              }
              $category_id = $_GET['id'];
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM product WHERE category_fk = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($category_id));
              $products = $q->fetchAll();
              foreach ($products as $row) {
                echo '<tr>';
                echo '<form method="GET" action="productDetails.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td>'.$row['product_name'].'</td>'; 
                echo '<td>'.$row['price'].'</td>';
                echo '<td><input type="submit" value="More Details"></td>';
                echo '</form>';
                echo '<form method="POST" action="addToCart.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Add to Cart"></td>';
                echo '</form>';
                echo '</tr>';
              }
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
    </div><!-- /.container -->

    <?php require_once('includes/footer.php');?>

   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>