<?php
require_once 'includes/session.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<?php require_once'includes/header.php'; ?>

<head>
    <title>View Product Details</title>
</head>

<body>
    <?php  require_once'includes/navbar.php'; ?><br>
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

                    <tr>
                        <td><?php echo $myproduct['product_name']; ?></td>

                        <td><?php echo $myproduct['description']; ?></td>

                        <td><?php echo $myproduct['price']; ?></td>

                        <td><a class="btn btn-default" href="addCart.php?id=&lt;?php echo $myproduct['id']; ?&gt;">Add To Cart</a></td>
                    </tr>
                </tbody>
            </table>
        </div><br>
        <br>
        <br>
        <br>
    </div><!-- /container -->
    <?php require_once('includes/footer.php');?>
</body>
</html>
