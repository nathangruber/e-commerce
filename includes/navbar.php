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
     <li>
<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
</li>
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
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <li><a href="register.php">Register</a></li>
    <li><a href="loginpage.php">Login</a></li>
    <li><a href="about.php" >About</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    
    <li><a href="update.php">My Account</a></li>
    <li><a href="cart.php">Cart</a></li>
            </ul>
          </div>
        </div>
      </nav>