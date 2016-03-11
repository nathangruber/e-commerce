<?php 
  require_once('includes/database.php');
  require_once('includes/session.php');
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
      $response = $updateCC->update($name,$cardnumber,$expiration_date,$security_code,$address_fk,$id);
      if ($response) {
        header('Location: update.php');
      } else {
        header('Location: update.php');
      }
    }  
   /*
    function valid($uservar){
      return ( !empty($uservar) && isset($uservar) );
    }

    if ( !valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code) {
     
      header("Location: update.php");
    }

    try {
      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = " UPDATE creditcard SET name = ?, cardnumber = ?, expiration_date = ?, security_code= ? WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($name,$cardnumber,$expiration_date,$security_code,$cc_id));//need credit card id
      
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