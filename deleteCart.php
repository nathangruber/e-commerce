<?php
    require_once 'includes/session.php';
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
 
    if ( !empty($_POST['id']) && isset($_POST['id'])) {
      $productTransactionID = $_POST['id'];
      $deleteCart = new cart();
      $delete = $deleteCart->deleteCart($transaction_productsID);
      if ($delete) {
        header('Location: cart.php');
      } else {
        header('Location: cart.php');
      }
    }