<?php
session_start();
	
	$logged = false;
	if (!empty($_SESSION['id']) && !empty($_SESSION['user_name'])) {
		$logged = true;
	}
	$admin = false;
	if (!empty($_SESSION['id']) && ($_SESSION['permission']) == 1 ) {
		$admin = true;
	}
?>