 <?php
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');




 
  if ( !empty($_POST['creditcard_id']) && isset($_POST['creditcard_id'])) {

    $myCreditcards = new customerCreditcards($_SESSION['id']);
    $response = $myCreditcards->delete($_POST['creditcard_id']);
    

    if ($response) {
      header('Location: update.php?feedbackdeleted=ok');
    } else {
      header('Location: update.php?feedbackdeleted=error');
    }


  }