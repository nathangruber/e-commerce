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
			        $sql = "SELECT id, name, cat_description FROM category WHERE category_id = ? ";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($id))
			      
			    ?>
        			
		</body>
	</html>
<?php require_once 'includes/footer.php';?>