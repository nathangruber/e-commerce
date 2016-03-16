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
          $sql = "SELECT * FROM image WHERE product_id = ?";
          $q = $pdo->prepare($sql);
          $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
          $image = $data['image'];
          $imagedescription = $data['description'];
      ?>
          <h3> Product </h3>

               <h4> <?php echo $product_name; ?> </h4>

              <p> <?php echo $price; ?> </p>

              <p> <?php echo $description; ?> </p>

            <p> <?php echo $imagedescription; ?> </p>

           

            <form method="post" action="add_item.php">
                <input type="hidden" name="id" value="<?php echo $id ;?>">';
              <button type="submit" value="add">Add to Cart</button>
          </form> 

      