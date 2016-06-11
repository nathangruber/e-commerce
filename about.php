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
  <div class="jumbotron">
    <h1><strong>About</strong></h1>
    <p class="lead">Example for "<a href="http://www.joshuawinn.com/opening-youtube-links-dynamically-in-a-twitter-bootstrap-modal-window/" target="_blank" title="View Post">Opening YouTube Links Dynamically in a Twitter Bootstrap Modal Window</a>" . Links to YouTube videos are opened automatically as an embedded video in a single modal window. No need for extra HTML or embed codes.</p>

  </div>
</div>


<?php require_once 'includes/footer.php'; ?>
</body>
</html>
                <center><p>Blake's Board Shop makes high quality, made in Wisconsin skateboard and cruiserdecks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop.</p></center>
