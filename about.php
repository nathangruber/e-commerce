<?php require_once'includes/session.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html lang="en">
<?php require_once 'includes/header.php';?>

<head>
    <title>About Blake's Board Shop</title>
</head>

<body>
    <?php
if ($admin) {
	require_once'includes/adminNavbar.php';
} else {
	require_once'includes/navbar.php';
}
?>

    <div class="container">
        <div class="row">
            <div class="container" style="width: 100%;">
                <div class="theme-table-image col-sm-4"><img src="assets/img/0A32B0986D.jpg"></div>

                <div class="theme-table-image col-sm-4"><img src="assets/img/99factory_slider_05.jpg"></div>
            </div>

            <div class="theme-table=image col-sm-4"><p>Blake's Board Shop makes high quality, made in Wisconsin skateboard and cruiser decks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop.</p>
        </div>
    </div><?php
require_once('includes/footer.php');
?>
</body>
</html>
