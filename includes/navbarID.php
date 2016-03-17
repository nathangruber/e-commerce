<nav class="navbar navbar-inverse">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <div>
       <a class="navbar-brand" href="index.php" id="black"><img class="img-responsive logo" src="assets/img/bbs.png" height="27" width="27"></a>
      </div>
     </div>
     <div class="collapse navbar-collapse" id="navbar">
       <ul class="nav navbar-nav">
         <li><a href="index.php" class="img-responsive logo" src="assets/img/bbs.png"></a></li>
         <li><a href="index.php" class="black">Blake's Board Shop</a></li>
         <li><a href="register.php" class="black">Register</a></li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
           <ul class="dropdown-menu">  
          <?php foreach ($category->listcategory() as $cat) {
          echo "<li><a href='category.php?cid=" . $cat['id'] . " '>" . $cat['name'] . "</a></li>";}?>
      
         <li><a href="about.php" class="black">About</a></li>
         <li><a href="contact.php" class="black">Contact Us</a></li>
         <li><a href=""></a></li>   
         </ul>
         <ul class="nav navbar-nav navbar-right">
                  <form class="navbar-form navbar-left" role="search">
                      <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" id="search">
                      </div>
                  </form>
                  
       </ul>
     </div>
   </div>
 </nav>


