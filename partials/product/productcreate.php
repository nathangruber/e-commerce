<?php
     
    require_once 'includes/database.php';
    require_once 'includes/navbar.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $descriptionError = null;
        $priceError = null;
        $category_fkError = null;
        
        // keep track post values
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category_fk = $_POST['category_fk'];
        
        // validate input
       $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($description)) {
            $descriptionError = 'Please enter Description';
            $valid = false;
         }
         
        if (empty($price)) {
            $priceError = 'Please enter Price';
            $valid = false;
        }

        if (empty($category_fk)) {
            $category_fkError = 'Please enter Category';
            $valid = false;
        }       
        // insert data
        
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO product (name,description,price,category_fk) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$description,$price,$category_fk));
            $last_id = $pdo->lastInsertId();
            $sql2 = "INSERT INTO image (image,description,featured,product_fk) values(?, ?, ?, ?)";
            $q2 = $pdo->prepare($sql2);
            $q2->execute(array($name,$cost,$description,$last_id));
            $sql3 = "INSERT INTO product_bin (product_fk,bin_fk) values(?, ?)";
            $q3 = $pdo->prepare($sql3);
            $q3->execute(array($last_id,$bin_fk));
            Database::disconnect();
            header("Location: index.php");
        }
    }


}
?>
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Enter Products</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
                        <label class="control-label">Price</label>
                        <div class="controls">
                            <input name="price" type="text" placeholder="Price" value="<?php echo !empty($price)?$price:'';?>">
                            <?php if (!empty($priceError)): ?>
                                <span class="help-inline"><?php echo $priceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($category_fkError)?'error':'';?>">
                        <label class="control-label">Category</label>
                        <div class="controls">
                            <input name="category_fk" type="text"  placeholder="Category" value="<?php echo !empty($category_fk)?$category_fk:'';?>">
                            <?php if (!empty($category_fkError)): ?>
                                <span class="help-inline"><?php echo $category_fkError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                     <label class="control-label">Bin ID</label>
                      <br>
                        <select name="bin_id">
                            <?php
                                $pdo = Database::connect();
                                $sql = 'SELECT * FROM bin ORDER BY id DESC';                         
                                   foreach ($pdo->query($sql) as $row) {
                                            echo '<option name="bin_id" value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                  }
                                   Database::disconnect();
                                  ?>
                        </select>
                      <br>


                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
require_once 'includes/footer.php';
?>