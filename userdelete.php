<?php
 die();
    require_once 'includes/database.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      try { 
        $id = $_POST['id'];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `e-commerce`.`customer` WHERE `customer`.`id` = ?"; 
        $q->execute(array($id));
        Database::disconnect();
        header("Location: update.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        //die();
        header("Location: update.php?error=1");
      }
    }


<?php
  require_once('includes/database.php');
  require_once('includes/session.php');
  require_once('includes/crud.php');

 
  if ( !empty($_POST['cc_id']) && isset($_POST['cc_id'])) {

    $myCreditcards = new customer($_SESSION['id']);
    $response = $myAddresses->delete($_POST['cc_id']);

    if($response){
      echo "success";
    } else {
      echo "failure";
    }

  } else {
    // redirect
    echo "didn't get param";
  }
