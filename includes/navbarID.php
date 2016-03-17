<?php
			$pdo = Database::connect();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "SELECT id,name FROM category ORDER BY name";
	        $q = $pdo->prepare($sql);
	        $q->execute();
	        $categories = $q->fetchAll();
	        Database::disconnect(); 
     if( isset( $_SESSION['userid'] ) )
     {
        echo "you are logged in" ;
     }
   else
     {
        echo "create account to login";
     }
  ?>
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
      		<div class="navbar-header">
        			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              		<span class="icon-bar"></span>
              		<span class="icon-bar"></span>
              		<span class="icon-bar"></span>
          		</button>
        			<!-- <a class="navbar-brand" href="#"><h5> Milwaukee Glassware </h5><img src="MKE Glass" alt="" id="navlogo"></a> -->
      		</div>
      		<div class="collapse navbar-collapse" id="myNavbar">
        			<ul class="nav navbar-nav">
             			





                  <li><a href="index.php">Blake's Board Shop</a></li>
              		<li><a href="register.php" class="black">Register</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
                			<ul class="dropdown-menu">	
                					<?php foreach ($category as $row){?><li id="<?php echo $row['id'];?>"><a href="category.php?catid=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li><?php }?>		
                			</ul> 
              		<li><a href="about.php">About</a></li>
              		<li><a href="contact.php">Contact</a></li>
                  <li><a href=""></a></li>                
        			</ul>
        			
               
        		  </ul>
      		</div>
  		</div>
	</nav>