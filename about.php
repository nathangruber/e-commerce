<?php require_once'includes/session.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

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
        <div class = "row">
        <div class="col-md-12">
<div class = "abouttext">


<p>Blake's Board Shop makes high quality, made in Wisconsin skateboard and cruiserdecks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop.
</p></div>
        </div>
      </div>
    </div>
        
<div class="image">
<img src="assets/img/beef-506456_1280.jpg" class="img-rounded" alt="Thumbs up" width="640" height="1150">
</div>


<?php require_once 'includes/footer.php'; ?>
</body>
</html>


