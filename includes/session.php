<?php
session_start();
	
$logged = false;
if (!empty($_SESSION['id'])) && !empty($_SESSION['username'])){
	$logged = true;
}
?>