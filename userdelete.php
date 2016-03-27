<?php
require_once('includes/session.php');
if(!$logged){
	header("Location: index.php");
	die(); // just in case
}
require_once('includes/database.php');
require_once('includes/crud.php');
$pdo = Database::connect();


if ( !empty($_POST['id']) && isset($_POST['id'])) {
	try {
		$id = $_POST['id'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM `e-commerce`.`customer` WHERE `customer`.`id` = ?";
		$q->execute(array($id));
		Database::disconnect();
		header("Location: update.php");
	} catch (PDOException $e) {
		//echo "Syntax Error: ".$e->getMessage() . "<br />\n";
		//die();
		header("Location: update.php?error=1");
	}
}
