<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container">
    <div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
         <a class="navbar-brand" href="index.php" id="black"><img src="assets/img/bbs.png" height="27" width="27"></a>
     </div>


   <div id="navbar" class="collapse navbar-collapse">

    <ul class="nav navbar-nav">

    <li><a href="index.php">Blake's Board Shop</a></li>


    <?php
$categories = new category();
$cats = $categories->read();

echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Products<span class="caret"></span></a>';
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
    <li><a></a></li>
    <li><a></a></li>
	  <li><a></a></li>
	  <li><a></a></li>
	  <li><a></a></li>
	  <li><a></a></li>
	  <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
    <li><a href="update.php">My Account</a></li>
    <li><a href="cart.php">Cart</a></li>
            </ul>
          </div>
        </div>
      <script type="text/javascript">

   $(document).ready(function(){
      $( "#find" ).keyup(function(){
         fetch();
      });
   });

   function fetch()
   {
   
      var val = document.getElementById( "find" ).value;
      $.ajax({
         type: 'post',
         url: 'fetch.php',
         data: {
            get_val:val
         },
         success: function (response) {
            document.getElementById( "search_items" ).innerHTML = response; 
         }
      });

   }
</script>

    </head>

   <body>
    <div id="search_box">
      <center>
         <p id="heading">Instant FullText Search System Using Ajax And PHP</p>
         <form method='get' action='fetch.php'>
         <input type="text" name="get_val" id="find" placeholder="Enter Your Text Here">
         <input type="submit" name="search" id="search" value="Search">
         </form>

         <div id="search_items">
         </div>
      </center>
    </div>
      </nav>