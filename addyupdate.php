<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');
  $pdo = Database::connect();


  if ( !empty($_POST)) {

    // keep track post values
    $id = $_POST['id'];
    $street_1 = $_POST['street_1'];
    $street_2 = $_POST['street_2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
     
      $updateAddress = new customerAddress($_SESSION['id']);
      $response = $updateAddress->update($street_1,$street_2,$city,$state,$zip_code,$id);
      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }  
    
    //echo $id . "<br>" . $name . "<br>" . $birth_date . "<br>" . $phone_number . "<br>" . $email_address . "<br>";

    /*function valid($uservar){
      return ( !empty($uservar) && isset($uservar) );
    }

    if ( !valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code) {
      //echo "died 1";
      //die();
      header("Location: update.php");
    }

    try {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE address SET street_1 = ?, street_2 = ?, city = ?, state = ?, zip_code = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($street_1,$street_2,$city,$state,$zip_code,$addy_id));
      //echo "queried";
      //die();
      header("Location: update.php");
    } catch (PDOException $error){
      echo "Error: " . $error->getMessage();
      die();
    }

  } else {
    //echo "empty post";
    //die();
    header("Location: update.php");
  }