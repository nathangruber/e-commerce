<?php 
  require_once('includes/session.php');
  if(!$logged){
    header("Location: index.php");
    die(); // just in case
  }
  require_once('includes/database.php');
  require_once('includes/crud.php');
    if ($admin) {
      require_once'includes/adminNavbar.php';
    } else {
      require_once'includes/navbar.php';
    }
    if ( !empty($_POST)) {
      $name = $_POST['name'];
      $address_fk = $_POST['address_fk'];
         
      function valid($varname){
        return ( !empty($varname) && isset($varname) );
      }
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE shipment_center SET name = ?, address_fk = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$address_fk,$_POST['id']));
      Database::disconnect();
      header("Location: adminUpdate.php");
    }