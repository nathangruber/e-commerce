<?php require_once('includes/session.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<?php require_once 'includes/header.php';?>

<head>
    <title>Site Map</title>
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
    <img id="siteimage" src="assets/img/bbs1.png" alt="Banner Image" width="300">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Site Map</h2>

                <p><a href="index.php">Home Page</a></p>

                <ul>
                    <li>Introduction to Blake's Board Shop</li>
                </ul>

                <p><a href="category.php">Our Boards</a></p>

                <ul>
                    <li>Blake's Skateboard Decks</li>

                    <li>Blake's Cruiser Decks</li>

                    <li>Hardware</li>
                </ul>

                <p><a href="register.php">Register</a></p>

                <ul>
                    <li>Register</li>
                </ul>

                <p><a href="loginpage.php">Login</a></p>

                <ul>
                    <li>Login</li>
                </ul>

                <p><a href="about.php">About Blake's</a></p>

                <ul>
                    <li>Blake's Board Shop's Mission</li>
                </ul>

                <p><a href="contact.php">Contact Us</a></p>

                <ul>
                    <li>Email Form</li>
                </ul>

                <p><a href="cart.php">Cart</a></p>

                <ul>
                    <li>Your Cart</li>
                </ul>
            </div>
        </div><?php
require_once 'includes/footer.php';
?>
    </div>
</body>
</html>
