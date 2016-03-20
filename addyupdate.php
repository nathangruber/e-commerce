<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); 
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');
  $pdo = Database::connect();


  if ( !empty($_POST)) {

    // keep track post values
    $id = $_POST['addy_id'];
    $street_1 = $_POST['street_1'];
    $street_2 = $_POST['street_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
     
    $updateAddress = new customerAddress($_SESSION['id']);
    $response = $updateAddress->update($street_1,$street_2,$city,$state,$zip_code,$id);
    if ($response) {
      header('Location: update.php?feedback=ok');
    } else {
      header('Location: update.php?feedback=error');
    }
  } 
