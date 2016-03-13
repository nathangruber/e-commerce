<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');

  if ( !empty($_POST)) {

    // keep track post values
    $creditcard_id = $_POST['creditcard_id'];
    $name = $_POST['name'];
    $cardnumber = $_POST['cardnumber'];
    $expiration_date = $_POST['expiration_date'];
    $security_code = $_POST['security_code'];
    $address_fk = $_POST['address_fk'];

    $updateCC = new customerCreditcards($_SESSION['id']);
    $response = $updateCC->update($creditcard_id,$name,$cardnumber,$expiration_date,$security_code,$address_fk);
    if ($response) {
    header('Location: update.php?feedback=ok');
    } else {
      header('Location: update.php?feedback=error');
    }
  }  
?>