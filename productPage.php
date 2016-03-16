<?php  require_once 'includes/session.php'; ?>
<!DOCTYPE html>
	<html lang="en">
		<?php require_once 'includes/header.php';?>
		<body>

			<?php require_once 'includes/navbar.php';?>

				<?php	
					$id = $_GET['productid'];
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "SELECT * FROM product WHERE id = ? ";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($id));
			        $data = $q->fetch(PDO::FETCH_ASSOC);
			        $name = $data['name'];
			        $cost = $data['cost'];
			        $description = $data['description']; 
			        // print_r($catinfo);
			    // echo $name;
			?>

			<?php
					$id = $_GET['productid'];
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT * FROM image WHERE product_id = ?";
					$q = $pdo->prepare($sql);
					$q->execute(array($id));
				    $data = $q->fetch(PDO::FETCH_ASSOC);
					$image = $data['image'];
					$imagedescription = $data['description'];
			?>
					

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
       <ul class="dropdown-menu">

			

			     	 
			<?php require_once 'includes/footer.php';?>
		</body>
	</html>