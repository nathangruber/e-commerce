<?php
require_once 'includes/session.php';



//Add it to the cart

$product_id = $_GET['id'];

$cart = new cart($_SESSION['id']);
$result = $cart->addCart($product_id);

if($result){
    header('Location: cart.php');
}else{


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<?php require_once'includes/header.php'; ?>

<head>
    <title></title>
</head>

<body>
    <?php
        if ($admin) {
            require_once'includes/adminNavbar.php';
        } else {
            require_once'includes/navbar.php';
        }
    ?><br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="span12">
                ERROR
            </div>
        </div><br>
        <br>
        <br>
        <br>
    </div><!-- /container -->
    <?php require_once('includes/footer.php');?><?php
    }
    ?>
</body>
</html>
