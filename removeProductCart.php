<?php
error_reporting(E_ALL);
require_once 'includes/database.php';
require_once 'includes/crud.php';
require_once 'includes/session.php';

if ( !empty($_GET)) {
	// keep track post values
	$product_id = $_GET['id'];




	$mycart = new cart($_SESSION['id']);
	$update = $mycart->removeOneItem($product_id);
	if ($update) {
		header('Location: cart.php?message=Product removed');
	}else {
		header('Location: cart.php?message=Error product not removed');
	}
}