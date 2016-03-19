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
	          $product = new product($_GET['id']);
	          
	          $row = $product->read();
	          
	          print_r($row);
	            
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