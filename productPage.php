<?php  require_once 'includes/session.php'; ?>
<!DOCTYPE html>
  <html lang="en">
    <?php require_once 'includes/header.php';?>
    <body>

      <?php require_once 'includes/navbar.php';?>

        <?php 
          $id = $_GET['productid'];
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM product WHERE id = ? ";
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
          $data = $q->fetch(PDO::FETCH_ASSOC);
          $product_name = $data['product_name'];
          $description = $data['description'];
          $price = $data['price']; 
              
      ?>

      <?php
          $id = $_GET['productid'];
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT * FROM image WHERE product_fk = ?";
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
          $data = $q->fetch(PDO::FETCH_ASSOC);
          $image = $data['image'];
          $image_description = $data['image_description'];
      ?>
          <h3> Product </h3>

               <h4> <?php echo $product_name; ?> </h4>

              <p> <?php echo $description; ?> </p>

              <p> <?php echo $price; ?> </p>

            <p> <?php echo $image_description; ?> </p>

           
      </body>
  </html>
      