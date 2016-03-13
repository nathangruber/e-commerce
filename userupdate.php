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
    
    echo 'The session id is: '.$_SESSION['id'].'<br>';

    $updatecustomer = new customer();
    $response = $updatecustomer->update($name,$birth_date,$gender,$phone_number,$email_address,$username,$_SESSION['id']);
    if ($response) {
      //header('Location: update.php');
      echo 'response is true';
    } else {
      echo 'response is false';
      //header('Location: update.php?error=1');
    }
  }else{
    header('Location: update.php');
  }  

    