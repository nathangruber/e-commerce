<?php require_once('includes/session.php');?>
<!DOCTYPE html>

<html lang="en">
<?php require_once 'includes/header.php';?>

<body>
    <title>Blake's Board Shop</title>
    
    <?php
    if ($admin) {
        require_once'includes/adminNavbar.php';
    } else {
        require_once'includes/navbar.php';
    }
    ?>
 
    <header class="main-header" role="banner">
        <div id="container">
            <?php
    if ($logged) {
        echo "Welcome Back, ";
        echo $_SESSION['name'];
    }
    ?>
 
            <div class="leftimage"><img src="assets/img/bbs1.png" alt="BBS logo" height="154" width="168"></div>
<br>
            <div class="righttext">
                Blake's Board Shop makes high quality, made in Wisconsin skateboard decks. Our e-shop is committed to producing great decks at an affordbale price. Blake’s is a family-owned skateboard e-shop. <a href="https://twitter.com/bbshop" class="twitter-follow-button" data-show-count="false">Follow @bbshop</a> <script type="text/javascript">
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                </script>
            </div>
        </div><img id="banner" src="assets/img/skatelogo.png" alt="Banner Image">
    </header>

    <div class="container">
        <div class="img-responsive col-sm-4">
           <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=5.php" id="black"><img id="board" src="assets/img/6796009882_074f87df69_b.jpg" alt="Skateboard" height="187" width="333"></a>
        </div>

        <div class="img-responsive col-sm-4">
            <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=10" id="black"><img id="long" src="assets/img/18752831476_4634222c05_b.jpg" alt="Longboard" height="187" width="333"></a>
        </div>

        <div class="img-responsive col-sm-4">
            <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=12" id="black"><img id="truck" src="assets/img/maxresdefault.jpg" alt="Skate Truck" height="187" width="333"></a>
        </div>
    </div>

    <div class="bbstext1">
        <div class="container">
            <div class="starter-template">
                <center>
                    <p class="lead"></p><small>Please Login or Click Register to set up an account with Blake's Board Shop.</small><br>
                </center>
            </div>
        </div>
    </div>
<center>

<?php require_once 'includes/footer.php'; ?>


</body>
</html>
