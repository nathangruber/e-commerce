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
 <br>
 <br>
    <div class="jumbotron">
  <h1>Blake's Board Shop</h1> 
  <p></p> 
    </div>
    <div class="container">
      <p></p> 
    </div>

<!--    <div class="container">
        <div class="img-responsive col-sm-4">
           <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=5.php" id="black"><img id="board" src="assets/img/6796009882_074f87df69_b.jpg" alt="Skateboard" height="187" width="333"></a>
        </div>

        <div class="img-responsive col-sm-4">
            <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=10" id="black"><img id="long" src="assets/img/18752831476_4634222c05_b.jpg" alt="Longboard" height="187" width="333"></a>
        </div>

        <div class="img-responsive col-sm-4">
            <a href="http://ec2-54-213-132-61.us-west-2.compute.amazonaws.com/e-commerce/category.php?id=12" id="black"><img id="truck" src="assets/img/maxresdefault.jpg" alt="Skate Truck" height="187" width="333"></a>
        </div>
    </div> -->
<div class="container-fluid">
    <div class="row text-center">
        <h3 style="color:white;font-family:verdana;">Snap Tight Image Tiles (Responisve)</h3>
    </div>
    <div class="row">
        <div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/300/200/nightlife/2) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-8" style="background: url(http://lorempixel.com/600/200/nightlife/3) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/1) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/4) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/6) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>

        <div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/600/200/city/4) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
        <div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/300/200/city/5) no-repeat center top;background-size:cover;">
            <p>
                Text Caption
            </p>
        </div>
       
    </div>
<?php require_once 'includes/footer.php'; ?>


</body>
</html>
