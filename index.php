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
 <br>
    <div class="jumbotron">
  <h1>Blake's Board Shop</h1> 
  <p></p> 
</div>
<div class="container">
  <p></p> 
</div>
<div id="carousel-example" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-wrapper">
        <h2>Categories</h2>
        <ol class="carousel-indicators">
            <span data-target="#carousel-example" data-slide-to="0">Tiger</span>
            <span data-target="#carousel-example" data-slide-to="1">Balloon</span>
            <span data-target="#carousel-example" data-slide-to="2" class="active">Tree</span>
        </ol>
    </div>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="row">
                <div class="col-sm-6">
                    <div class="img-wrapper">
                        <img src="http://www.hdwallpapersimages.com/wp-content/uploads/2014/01/Winter-Tiger-Wild-Cat-Images.jpg">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="carousel-caption">
                        <h2>Tiger</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, laboriosam mollitia, excepturi ad assumenda impedit commodi dolore nulla adipisci est ratione incidunt doloribus, nesciunt minus deserunt facere fugit!.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="row">
                <div class="col-sm-6">
                    <div class="img-wrapper">
                        <img src="http://images.visitcanberra.com.au/images/canberra_hero_image.jpg">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="carousel-caption">
                        <h2>Balloon</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium voluptatibus voluptatem dolore repudiandae rem vel saepe illum error totam. Tenetur suscipit, magnam odio magni ab nam mollitia velit dolores laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores porro, sapiente, explicabo distinctio id dolorem. Cupiditate porro aliquid vitae labore ducimus nisi dolorem deleniti est. Numquam aspernatur quisquam repudiandae voluptatem!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="row">
                <div class="col-sm-6">
                    <div class="img-wrapper">
                        <img src="http://blog.jimdo.com/wp-content/uploads/2014/01/tree-247122.jpg">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="carousel-caption">
                        <h2>Tree</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae optio expedita asperiores nesciunt cum nisi, eveniet atque quis minus vero quas magni assumenda deserunt, sint obcaecati, ea cupiditate. Voluptatibus, labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ratione doloribus, id provident hic. Dolorum ratione suscipit enim minus repellat. Alias iure aperiam cum nulla aut molestias blanditiis explicabo reprehenderit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.carousel').carousel({
    interval: false
});</script>
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
<?php require_once 'includes/footer.php'; ?>


</body>
</html>
