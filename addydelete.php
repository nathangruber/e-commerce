<?php
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');
  $pdo = Database::connect();
  if ( !empty($_POST['addy_id']) && isset($_POST['addy_id'])) {

    $myAddresses = new customerAddress($_SESSION['id']);
    $response = $myAddresses->delete($_POST['addy_id']);

    if($response){
      echo "success";
    } else {
      echo "failure";
    }

  } else {
    // redirect
    echo "didn't get param";
  }