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
      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE customer SET name = ?, birth_date = ?, phone_number = ?, email_address = ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$birth_date,$phone_number,$email_address,$id));
   
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
  ?>
  <?php Database::disconnect(); ?>