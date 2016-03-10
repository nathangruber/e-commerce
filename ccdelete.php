<?php
  require_once('includes/database.php');
  require_once('includes/session.php');
  require_once('includes/crud.php');

 
  if ( !empty($_POST['cc_id']) && isset($_POST['cc_id'])) {

    $myCreditcards = new customer($_SESSION['id']);
    $response = $myCreditcards->delete($_POST['cc_id']);

    if($response){
      echo "success";
    } else {
      echo "failure";
    }

  } else {
    // redirect
    echo "didn't get param";
  }