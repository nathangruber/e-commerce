<?php 
require_once 'includes/session.php';
 
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once'includes/header.php'; ?>
<title>View Product Details</title>
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
	          $product = new product($_GET['id']);
	          
	          $myproduct = $product->read();
	        ?>
	        
	          <td><?php echo $myproduct['product_name']; ?></td>
	          <td><?php echo $myproduct['description']; ?></td>
	          <td><?php echo $myproduct['price']; ?></td>
	          <td><a class="btn btn-default" href="addCart.php?id=<?php echo $myproduct['id']; ?>">Add To Cart</a></td>
	            
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