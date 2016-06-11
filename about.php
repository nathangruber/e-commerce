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
    <h1><strong>YouTube Opening Example</strong></h1>
    <p class="lead">Example for "<a href="http://www.joshuawinn.com/opening-youtube-links-dynamically-in-a-twitter-bootstrap-modal-window/" target="_blank" title="View Post">Opening YouTube Links Dynamically in a Twitter Bootstrap Modal Window</a>" . Links to YouTube videos are opened automatically as an embedded video in a single modal window. No need for extra HTML or embed codes.</p>
    
    <!-- The HREF just points to a normal YouTube link -->
    <p>
      <a class="btn btn-primary btn-lg" href="http://www.youtube.com/watch?v=6w4FI0Jq0lI" role="button">Open a Video</a> 
      
      <a class="btn btn-primary btn-lg" href="http://www.youtube.com/watch?v=6w4FI0Jq0lI" role="button" data-width="640" data-height="360">Open Another Video</a>
    </p>
    
  </div>
</div>


    
</body>
</html>
                <center><p>Blake's Board Shop makes high quality, made in Wisconsin skateboard and cruiserdecks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop.</p></center>
