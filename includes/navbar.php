<nav class="navbar navbar-default navbar-fixed-top">
        
    <div class="container">
        <div class="navbar-header">
          
        <button type="button" class="navbar-toggle btn-custom" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="pull-left" href="index.php"><img src="assets/img/bbs.png" height="26" width="26"></a>     

        </div>
         
     <div id="navbar" class="collapse navbar-collapse">
            
        <ul class="nav navbar-nav">
        
        <li><a  href="index.php">Home</a></li>    


    <?php
$categories = new category();
$cats = $categories->read();

echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="category.php">Products<span class="caret"></span></a>';
echo '<ul class="dropdown-menu">';

foreach ($cats as $category ) {
	echo '<li id="' . $category['id'] . '">';
	echo '<a href="category.php?id=' . $category['id'] . '">';
	echo ' ' . $category['name'] . ' ';
	echo '</a>';
	echo '</li>';

}
echo '</ul>';
echo '</li>';
Database::disconnect();

?>


    <li><a href="register.php">Register</a></li>
    <li><a href="loginpage.php">Login</a></li>
    <li><a href="about.php" >About</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="update.php">My Account</a></li>
    <li><a href="cart.php">Cart</a></li>
            </ul>
<form method="post" action="index.php" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search by city..." name="search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
  
  
    <ul class="nav navbar-nav pull-right">
      
      
    <?php
    if(!$logged){
    echo '<li><a href="register.php">Register</a></li>';
      echo '<li><a href="loginpage.php">Login</a></li>';
    }else{
      echo '<li><a href="myhikes.php">' . $_SESSION['name'] . '</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    }
    ?>
    </ul>
</nav>



 <!--     <div class="container">
        <div class="col-md-3 pull-right">
          <form class="navbar-form" role="search">
            <div class="input-group add-on">
              <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>

        </div>
      </div>
 </nav>