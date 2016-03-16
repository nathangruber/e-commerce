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
			            <h3> Product </h3>

			      	 <h4> <?php echo $name; ?> </h4>

			       	<p> <?php echo $cost; ?> </p>

			       	<p> <?php echo $description; ?> </p>

			     	 <p> <?php echo $imagedescription; ?> </p>
			
		</body>
	</html>
	<?php require_once 'includes/footer.php';?>