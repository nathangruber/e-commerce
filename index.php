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
<div class="container">
    <div class="row">
        <h4>So I've worked on a new project and came up with this UI. Here you can use it. :) Follow me on twitter: <a href="https://twitter.com/AlexMahrt/">@AlexMahrt</a></h4>
    </div>
    <hr>
            <div class="row row-margin-bottom">
            <div class="col-md-5 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="http://lorempixel.com/850/850/?random=123">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                Example library
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item" data-category="ui">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="http://lorempixel.com/850/850/?random=456">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                Example library
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-1"></div>
            <div class="col-md-5 no-padding lib-item" data-category="ui">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img" src="http://lorempixel.com/850/850/?random=456">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                Example library
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>
<?php require_once 'includes/footer.php'; ?>


</body>
</html>
