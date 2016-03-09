<?php
  error_reporting(E_ALL);
  require_once 'includes/database.php';
  require_once('includes/session.php');

  if ( !empty($_POST)) {

    // keep track post values
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $cardnumber = $_POST['cardnumber'];
    $expiration_date = $_POST['expiration_date'];
    $security_code = $_POST['security_code'];
  

    function valid($uservar){
      return ( !empty($uservar) && isset($uservar) );
    }

    if ( !valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code) {
     
      header("Location: update.php");
    }

    try {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE creditcard SET name = ?, cardnumber = ?, expiration_date = ?, security_code= ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$cardnumber,$expiration_date,$security_code,$id));
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