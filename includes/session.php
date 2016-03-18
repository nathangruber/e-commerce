<?php
session_start();
	
	$logged = false;
	if (!empty($_SESSION['id']) && !empty($_SESSION['username'])) {
		$logged = true;
	}
	$admin = false;
	if (!empty($_SESSION['id']) && ($_SESSION['permission']) == 1 ) {
		$admin = true;
	}

require_once 'includes/database.php';
require_once 'includes/crud.php';
