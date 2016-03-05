<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Transaction Products</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Quantity</th>
                      <th>Transaction Subtotal</th>
                      <th>Product</th>
                      <th>Transaction</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once 'includes/database.php';
                   require_once 'includes/navbar.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM transaction_products ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['quantity'] . '</td>';
                            echo '<td>'. $row['transaction_subtotal'] . '</td>';
                            echo '<td>'. $row['product_fk'] . '</td>';
                            echo '<td>'. $row['transaction_fk'] . '</td>';
                           
                            echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
<?php
require_once 'includes/footer.php';
?>