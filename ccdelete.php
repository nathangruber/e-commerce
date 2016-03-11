<?php
  require_once('includes/database.php');
  require_once('includes/session.php');
  require_once('includes/crud.php');

 
  if ( !empty($_POST['creditcard_id']) && isset($_POST['creditcard_id'])) {

    $myCreditcards = new customerCreditcards($_SESSION['id']);
    $response = $myCreditcards->delete($_POST['creditcard_id']);
  
  if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }
    /*if($response){
      echo "success";
    } else {
      echo "failure";
    }

  } else {
    // redirect
    echo "didn't get param";
  }