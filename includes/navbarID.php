<ul>
<li><a href="index.php">Home</a></li>
<li><ul>
<?php
$categories = new category();

foreach ($categories->listcategories() as $cat) {
		echo "<li><a href='category.php?cid=" . $cat['id'] . " '>" . $cat['name']	. "</a></li>";
			}
			?>
			</ul></li>
			</ul>