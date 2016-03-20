<?php
 	error_reporting(E_ALL);
    require_once 'includes/database.php';
    require_once 'includes/crud.php';
    require_once 'includes/session.php';
 
    if ( !empty($_GET)) {
      // keep track post values
      $type = $_GET['type'];
      $product_id = $_GET['id'];
      
      
      
      
      $mycart = new cart($_SESSION['id']);
      $update = $mycart->updateQuantity($type,$product_id);
      if ($update) {
        header('Location: cart.php?message=Product updated');
      } else {
        header('Location: cart.php?message=Error product not updated');
      }
    }
?>