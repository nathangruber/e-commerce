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
              <th>Description</th>
            </tr>
          </thead>
        <tbody>
    
              <?php 
              $category_id = $_GET['id'];

              $product = new product();
              $products = $product->readAllCategory($category_id);

              foreach ($products as $row) {
	              
	          ?>
	          	<tr>
		          	<td><?php echo $row['product_name']; ?></td>
		          	<td><?php echo $row['price']; ?></td>
		          	<td><a class="btn btn-default" href="productPage.php?id=<?php echo $row['id']; ?>">View Product Details</a></td>
		          	<td><a class="btn btn-default" href="addCart.php?id=<?php echo $row['id']; ?>">Add to cart</a></td>
	          	</tr>
	          <?php
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