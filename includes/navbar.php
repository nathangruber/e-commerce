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
        
        <li><a href="index.php">Home</a></li>    


    <?php
$categories = new category();
$cats = $categories->read();
//print_r($cats);
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


    
    <li><a href="about.php" >About</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    
    <?php
	  if($logged==true){
	  ?>
	  <li><a href="update.php">My Account</a></li>
	  <li><a href="cart.php">Cart</a></li>
    <li><a href="logout.php">Logout</a></li>

	  <?php
	  }else{
		  ?>
		  <li><a href="register.php">Register</a></li>
      <li><a href="loginpage.php">Login</a></li>


		  <?php
	  } 
	?>
    
            </ul>
      <div class="container">
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