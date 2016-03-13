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
    $username = $_POST['username'];
    
 

    $thecustomer = new customer();
    $read_response = $thecustomer->read($_SESSION['id']);
    $response = $thecustomer->update($name,$birth_date,$gender,$phone_number,$email_address,$read_response['username'],$_SESSION['id']);
    if ($response) {
      header('Location: update.php?feedback=ok');
    } else {
      header('Location: update.php?feedback=error');
    }
  }else{
    header('Location: update.php');
  }  

    