<?php
require_once 'includes/session.php' ;
require_once 'includes/database.php';
require_once 'includes/crud.php';
error_reporting(E_ALL);
 
    if ( !empty($_POST)) {
        // keep track post values
      $product_fk = $_POST['id'];
      $addCart = new cart();
      $add = $addCart->addCart($product_fk);
      if ($add) {
        header('Location: cart.php');
      } else {
        header('Location: cart.php');
      }
    }

    