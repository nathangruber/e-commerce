<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html>
<html>
<?php require_once 'includes/header.php'; ?>

<body>
<?php require_once 'includes/navbar.php'; ?>
<br><br><br><br><br><br>



<div class="container">
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
            </tr>
          </thead>
        <tbody>
    
              <?php 
              $category_id = $_GET['id'];
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM product WHERE category_FK = ?';
              $q = $pdo->prepare($sql);
              $q->execute(array($category_id));
              $products = $q->fetchAll();
              foreach ($products as $row) {
                echo '<tr>';
                echo '<form method="GET" action="productPage.php">'; 
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td>'.$row['product_name'].'</td>'; 
                echo '<td>'.$row['price'].'</td>';
                echo '<td><input class="btn btn-default" type="submit" value="view product"></td>';
                echo '</form>';
                echo '<form method="POST" action="addCart.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input class="btn btn-default" type="submit" value="Add to Cart"></td>';
                echo '</form>';
                echo '</tr>';
              }
              ?>
           </tbody>
        </table>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div><!-- /.container -->

<br><br>


<?php require_once('includes/footer.php'); ?>
</body>
</html>