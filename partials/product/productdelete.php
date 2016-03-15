<?php
    require_once 'includes/database.php';
    require_once 'includes/navbar.php';
    
     if (!empty($_POST['id']) && isset($_POST['id'])) {
        // keep track post values
        $id = $_POST['id'];
     try{    
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `ecommerce`.`product` WHERE `id` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: Update.php");
      } catch (PDOException $e) { 
        //echo "Syntax Error: ".$e->getMessage() . "<br />\n"; 
        //die();
        header("Location: Update.php?error=1");
      }
    }
