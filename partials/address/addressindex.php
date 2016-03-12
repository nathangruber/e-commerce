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
                <h3>Address</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                
                  <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Street Address</th>
                      <th>Street Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zip Code</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once 'includes/database.php';
                   require_once 'includes/navbar.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM address ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<form action="update.php" method="post">';
                            echo '<td><input type="text" name="street_1" value="' . $row["street_1"] . '"></td>';
                            echo '<td><input type="text" name="street_2" value="' . $row["street_2"] . '"></td>';
                            echo '<td><input type="text" name="city" size="12" value="' . $row["city"] . '"></td>';
                            echo '<td><input type="text" name="state" value="' . $row["state"] . '"></td>';
                            echo '<td><input type="text" name="zip_code" value="' . $row["zip_code"] . '"></td>';
                            echo '<input type="hidden" name="id" value="'.$row["id"].'">';
                            echo '<td>';
                            echo '<input type="submit" class="btn-success" value="update">';
                            echo '</form>';
                            echo '<form action="delete.php" method="post">';
                            echo '<input type="hidden" name="id" value="'.$row["id"].'">';
                            echo '<input type="submit" class="btn-danger" value="delete">';
                            echo '</form>';
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