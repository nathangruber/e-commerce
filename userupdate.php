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
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $phone_number = $_POST['phone_number'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    
    $updatecustomer = new customer();
    $response = $updatecustomer->update($name,$birth_date,$gender, $phone_number,$email_address,$_SESSION['id']);
    if ($response) {
      header('Location: update.php');
    } else {
      header('Location: update.php?error=1');
    }
  }  

    