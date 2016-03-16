<?php 
require_once('includes/session.php');?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'includes/header.php';?>

 <body>
    <?php 
    if ($admin) {
      require_once'includes/adminNavBar.php';
    } else {
      header('Location: index.php');
    }
    ?>

  <div class="container">

    <div class="row">
      <h3>Update Shipment Center Information</h3>
      <p>Please <a href="shipment_centerCreate.php">Create a Shipment Center</a>.</p>
      <p>Update existing Shipment Centers.</p>
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Shipment Center</th>
            <th>Address</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($logged) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM shipment_center ORDER BY name';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
           	 
           	  foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="shipment_centerUpdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
   	            //
	            echo '<td>';
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `address`.`id`, `address`.`street_1` FROM `address` ORDER BY `street_1` ASC";
       	        $address = $pdo->query($sql);
                echo "<select name='address_fk'>";
                foreach ($address as $row1) {
                  echo "<option value='" . $row1['id'] . "'";
                  if($row1['id']==$row['address_fk']){
                  	echo " selected ";
                  }
                  echo ">" . $row1['street_1'] . "</option>";
                }
                echo "</select>";
                echo "</td>";
                //
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="shipment_centerDelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
            }
          Database::disconnect();
              //print_r($query);
          ?>
        </tbody>
      </table>
    </div>

    <br>

    <div class="row">
      <h3>Update Bin Information</h3>
      <p>Please <a href="bincreate.php">Create a Bin</a>.</p>
      <p>Update your existing Bins.</p>
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Bin Name</th>
            <th>Shipment Center</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($logged) {
              $pdo = Database::connect();
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM bin ORDER BY name';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
           	 
           	  foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="binupdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
   	            //
	            echo '<td>';
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `shipment_center`.`id`, `shipment_center`.`name` FROM `shipment_center` ORDER BY `name` ASC";
       	        $shipment_center = $pdo->query($sql);
                echo "<select name='shipment_center_fk'>";
                foreach ($shipment_center as $row1) {
                  echo "<option value='" . $row1['id'] . "'";
                  if($row1['id']==$row['shipment_center_fk']){
                  	echo " selected ";
                  }
                  echo ">" . $row1['name'] . "</option>";
                }
                echo "</select>";
                echo "</td>";
                //end dropdown
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="bindelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
            }
          Database::disconnect();
              //print_r($query);
          ?>
        </tbody>
      </table>
    </div>

    <br>

    <div class="row">
      <h3>Update Category</h3>
    </div>
    <div>
      <p>Please <a href="categorycreate.php">Create a Category</a>.</p>
      <p>Update your existing Categories.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Description</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($loggedin) {
              //$pdo = Database::connect();
              //$id = $_SESSION['id'];
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM category ORDER BY id';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="categoryupdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="name" value="'.$row['name'].'"></td>'; 
                echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="categorydelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          ?>
        </tbody>
      </table>
    </div>


    <div class="row">
      <h3>Update Product Information</h3>
    </div>
    <div>
      <p>Please <a href="productcreate.php">Add a Product</a>.</p>
      <p>Update products.</p>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Bin</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($logged) {
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = 'SELECT * FROM product ORDER BY id';
              $q = $pdo->prepare($sql);
              $q->execute(array());
              $query = $q->fetchAll(PDO::FETCH_ASSOC);
            foreach ($query as $row) {
                echo '<tr>';
                echo '<form method="POST" action="productupdate.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="text" name="product_name" value="'.$row['product_name'].'"></td>'; 
                echo '<td><input type="text" name="description" value="'.$row['description'].'"></td>';
                echo '<td><input type="text" name="price" value="'.$row['price'].'"></td>';
	           
	            //
	            echo '<td>';
	            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `category`.`id`, `category`.`name` FROM `category` ORDER BY `name` ASC";
       	        $category = $pdo->query($sql);
                echo "<select name='category_fk'>";
                foreach ($category as $row1) {
                  echo "<option value='" . $row1['id'] . "'";
                  if($row1['id']==$row['category_fk']){
                  	echo " selected ";
                  }
                  echo ">" . $row1['name'] . "</option>";
                }
                echo "</select>";
                echo "</td>";
                //
                //
                echo '<td>';
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `bin`.`id`, `bin`.`name` FROM `bin` ORDER BY `name` ASC";
       	        $bin = $pdo->query($sql);
                echo "<select name='bin_fk'>";
                foreach ($bin as $row2) {
                  echo "<option value='" . $row2['id'] . "'";
                  if($row2['id']==$row['bin_fk']){
                  	echo " selected ";
                  }
                  echo ">" . $row2['name'] . "</option>";
                }
                echo "</select>";
                echo "</td>";
                //
                echo '<td><input type="submit" value="Update"></td>';
                echo '</form>';
                echo '<form method="POST" action="productdelete.php">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<td><input type="submit" value="Delete"></td>';
                echo '</form>';
                echo '</tr>';
              }
          }
                
          ?>
        </tbody>
      </table>
    </div>

    <div>
      <a href="index.php">Return to Index</a>
    </div>
    <br>
  </div> <!-- /container -->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
   require_once('includes/footer.php');
   Database::disconnect();
  ?>