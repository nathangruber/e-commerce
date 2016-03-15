<?php 
require_once'includes/session.php';
require_once'includes/database.php';
require_once'includes/crud.php';
require_once'includes/navbar.php';
 error_reporting(E_ALL);
 Database::connect();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	 <?php require_once 'includes/header.php';?>
	  <title>Products</title>
 </head>

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
	          if($logged) {
	          	  $pdo = Database::connect();
	              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	              $sql = 'SELECT * FROM product ORDER BY id';
	              $q = $pdo->prepare($sql);
	              $q->execute(array());
	              $query = $q->fetchAll(PDO::FETCH_ASSOC);
	            foreach ($query as $row) {
	                echo '<tr>';
	                echo '<form method="GET" action="productInformation.php">';
	                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	                echo '<td><input type="text" name="product_name" value="'.$row['product_name'].'"></td>'; 
	                echo '<td><input type="text" name="price" value="'.$row['price'].'"></td>';
	                echo '<td><input class="btn btn-default" type="submit" value="More Details"></td>';
	                echo '</form>';
	                echo '<form method="POST" action="////////addToCart.php">';
	                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
	                echo '<td><input class="btn btn-default" type="submit" value="Add to Cart"></td>';
	                echo '</form>';
	                echo '</tr>';
	            }
	          } else {
	          	header('Location: loginpage.php');
	          }
	          Database::disconnect();
	          ?>
	         </tbody>
	      </table>
	    </div>

        <div>
          <a href="index.php">Return to Blake's home page.
        <br>
        <br>
        <br>
    </div> <!-- /container -->

  <?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>