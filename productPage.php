<?php 
require_once 'includes/session.php';
 
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once'includes/header.php'; ?>
 <body>
<?php  require_once'includes/navbar.php'; ?>
<br><br><br><br><br><br>
  
 <div class="container">
      
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($logged) {



                $product = new product();
                $myInfo = $me->read($_SESSION["id"]);

                if(!empty($myInfo)){

                $pdo = Database::connect();
                $id = $_GET['id'];
                echo $id;
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM product WHERE id = ?';
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $query = $q->fetchAll(PDO::FETCH_ASSOC);
              foreach ($query as $row) {
                  echo '<tr>';
                  echo '<form method="GET" action="productinformation.php">';
                  echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                  echo '<td>'.$row['product_name'].'</td>'; 
                  echo '<td>'.$row['description'].'</td>'; 
                  echo '<td>'.$row['price'].'</td>';
                  echo '<td><input class="btn btn-default" type="submit" value="More Details"></td>';
                  echo '</form>';
                  echo '<form method="POST" action="addCart.php">';
                  echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                  echo '<td><input class="btn btn-default" type="submit" value="Add to Cart"></td>';
                  echo '</form>';
                  echo '</tr>';
                }
            }//else {
              //header('Location: loginpage.php');
           // }
            Database::disconnect();
            ?>
          </tbody>
        </table>
      </div>

      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->


<?php require_once('includes/footer.php');?>
  </body>
</html>