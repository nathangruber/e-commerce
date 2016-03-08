<?php
  error_reporting(E_ALL);
  require_once 'includes/database.php';
  require_once('includes/session.php');

  if ( !empty($_POST)) {

    // keep track post values
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $phone_number = $_POST['phone_number'];
    $email_address = $_POST['email_address'];
    
    //echo $id . "<br>" . $name . "<br>" . $birth_date . "<br>" . $phone_number . "<br>" . $email_address . "<br>";

    function valid($uservar){
      return ( !empty($uservar) && isset($uservar) );
    }

    if ( !valid($name) || !valid($birth_date) || !valid($phone_number) || !valid($email_address) || !filter_var($email_address,FILTER_VALIDATE_EMAIL) ) {
      //echo "died 1";
      //die();
      header("Location: update.php");
    }

    try {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE customer SET name = ?, birth_date = ?, phone_number = ?, email_address = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$birth_date,$phone_number,$email_address,$id));
      Database::disconnect();
      //echo "queried";
      //die();
      header("Location: update.php");
    } catch (PDOException $error){
      echo "Error: " . $error->getMessage();
      Database::disconnect();
      die();
    }

  } else {
    //echo "empty post";
    //die();
    header("Location: update.php");
  }