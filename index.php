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
        <div class="row">
            <div class="col-lg-12">
                <h3>Products</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="assets/img/6796009882_074f87df69_b.png" alt="skateboard deck">
                    <div class="caption">
                        <h3>Blake's Skateboard Decks</h3>
                        <p>Made in the USA. All decks come with free grip tape.</p>
                        <p>
                            <a href="../e-commerce/category.php?id=5.php" class="btn btn-primary">Buy Now!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="assets/img/18752831476_4634222c05_b.png" alt="cruiser deck">
                    <div class="caption">
                        <h3>Blake's Cruiser Decks</h3>
                        <p>Made in the USA. All decks come with free grip tape.</p>
                        <p>
                            <a href="../e-commerce/category.php?id=10" class="btn btn-primary">Buy Now!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="assets/img/maxresdefault.png" alt="hardware being put on a skateboard deck">
                    <div class="caption">
                        <h3>Hardware</h3>
                        <p>Blake's exculsively uses Shorty's Hardware&reg;.</p>
                        <p>
                            <a href="../e-commerce/category.php?id=12" class="btn btn-primary">Buy Now!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
