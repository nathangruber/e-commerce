<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<?php require_once 'includes/header.php'; ?>

<head>
    <title></title>
</head>

<body>
    <?php require_once 'includes/navbar.php'; ?><br>
    <br>
    <br>
    <br>
    <br>
    <br>

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

                        <td><a class="btn btn-default" href="productPage.php?id=&lt;?php echo $row['id']; ?&gt;">View Product Details</a></td>

                        <td><a class="btn btn-default" href="addCart.php?id=&lt;?php echo $row['id']; ?&gt;">Add to cart</a></td>
                    </tr><?php
                                  }  
                                  ?>
                </tbody>
            </table>
        </div><br>
        <br>
        <br>
        <br>
    </div><!-- /.container -->
    <br>
    <br>
    <?php require_once('includes/footer.php'); ?>
</body>
</html>
