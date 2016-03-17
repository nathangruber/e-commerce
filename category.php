<?php  require_once 'includes/session.php'; ?>
<!DOCTYPE html>
	<html lang="en">
			<?php require_once 'includes/header.php';?>
		<body>
			<?php require_once 'includes/navbar.php';?>

				<p> <?php echo "<p>" . $_GET['catid'] . "</p>"; ?> 

			<?php	
					$id = $_GET['catid'];
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "SELECT * FROM `category` WHERE category_fk = ?";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($id));
			        $category_fk = $q->fetchAll(); //Returns an array containing all of the result set rows
			        
			    
			?>
				<h3> Categories </h3>	
			<?php foreach ($category as $row){?>

			{?><li id="<?php echo $row['id'];?>"><a href="productPage.php.php?prodcatid=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>

			<?php } ?>
        							
			<?php require_once 'includes/footer.php';?>
		</body>
	</html>