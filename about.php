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
<div id="fullscreen_bg4" class="fullscreen_bg4"/>
<div class="container">
    <div class="row">
        <h2 class="text-center">BBS About</h2>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="box">
                        <div class="box-content">
                            <h1 class="tag-title">About Us</h1>
                            <hr />
                            <b>Blake's Board Shop makes high quality, made in Wisconsin skateboard and cruiserdecks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop.</b>
                            <br />
                        </div>
                    </div>
                </div>
               
            
            </div>           
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>



