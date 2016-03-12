<?php
    require_once 'includes/database.php';
    require_once 'includes/navbar.php';
    $id = $_POST['id'];
     
    if (!empty($_POST['id']) && isset($_POST['id'])) {  
        // keep track validation errors
        $street_1Error = null;
        $street_2Error = null;
        $cityError= null;
        $stateError = null;
        $zip_codeError = null;
         
        // keep track post values
        $street_1 = $_POST['street_1'];
        $street_2 = $_POST['street_2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        
     // validate input
        $valid = true;
        if (empty($street_1)) {
            $street_1Error = 'Please enter Street Address';
            $valid = false;
        }
        if (empty($street_2)) {
            $street_2Error = 'Please enter Street Address';
            $valid = false; 
        }
       if (empty($city)) {
            $cityError = 'Please enter City';
            $valid = false;
        }
        if (empty($state)) {
            $stateError = 'Please enter State';
            $valid = false;
        }
        if (empty($zip_code)) {
            $zip_codeError = 'Please enter Zip Code';
            $valid = false;
        }
        // update data
         if ($valid == FALSE) {
            echo "failed.";
            die();
        }
            try {
            // echo "in the connect";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE address set street_1 = ?, street_2 = ?, city = ?, state = ?, zip_code = ?  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($street_1,$street_2,$city,$state,$zip_code,$id));
            Database::disconnect();
            header("Location: index.php");
            }
            catch (PDOException $e){
                Database::disconnect();
                echo $e->getMessage();f
                die();
        }
    } else {
        // echo "are you there?";
         echo "failed.";
            die();
    }
require_once 'includes/footer.php';?>
