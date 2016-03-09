<?php
	error_reporting(E_ALL);
	session_start();
		
	$logged = false;
	if (!empty($_SESSION['id'])){
		$logged = true;
	}