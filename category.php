<?php  require_once 'includes/session.php'; ?>
<!DOCTYPE html>
	<html lang="en">
			<?php require_once 'includes/header.php';?>
		<body>
			<?php require_once 'includes/navbarID.php';?>

				<p> <?php echo "<p>" . $_GET['catid'] . "</p>"; ?> 

			<?php	
					$id = $_GET['catid'];
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "SELECT `id`, `product_name`, `description`, `price`, `category_fk` FROM `product` WHERE category_fk;";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($id));
			        $product = $q->fetchAll(); //Returns an array containing all of the result set rows
			        
			    
			?>
				<h3> Categories </h3>	
			<?php foreach ($product as $row){?>

			{?><li id="<?php echo $row['id'];?>"><a href="productPage.php?prodcatid=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>

			<?php } ?>
        							
			<?php require_once 'includes/footer.php';?>
		</body>
	</html>