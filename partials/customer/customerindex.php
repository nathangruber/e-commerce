<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Customer</h3>
            </div>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Birth Date</th>
                      <th>Gender</th>
                      <th>Phone Number</th>
                      <th>Email Address</th>
                      <th>Permissions</th>
                      <th>Username</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   require_once 'includes/database.php';
                   require_once 'includes/navbar.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customer ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<form action="update.php" method="post">';
                            echo '<td><input type="text" name="name" value="' . $row["name"] . '"></td>';
                            echo '<td><input type="text" name="birth_date" value="' . date('m-d-Y',strtotime($row["birth_date"])) . '"></td>';
                            echo '<td><input type="text" name="gender" value="' . $row["gender"] . '"></td>';
                            echo '<td><input type="text" name="phone_number" value="' . $row["phone_number"] . '"></td>';
                            echo '<td><input type="text" name="email_address" size="1" value="' . $row["email_address"] . '"></td>';
                            echo '<td><input type="text" name="permissions" size="1" value="' . $row["permissions"] . '"></td>';
                            echo '<td><input type="text" name="username" value="' . $row["username"] . '"></td>';
                            echo '<td><input type="text" name="password" value="' . $row["password"] . '"></td>';
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
