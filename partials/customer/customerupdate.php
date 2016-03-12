<?php
    require_once 'includes/database.php';
    require_once 'includes/navbar.php';
   
    $id = $_GET['id'];
     
   
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $birth_dateError = null;
        $genderError = null;
        $phone_numberError= null;
        $email_addressError = null;
        $permissionsError = null;
        $usernameError= null;
        $passwordError= null;
        
         
        // keep track post values
        $name = $_POST['name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $phone_number = $_POST['phone_number'];
        $email_address = $_POST['email_address'];
        $permissions = $_POST['permissions'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter your Name';
            $valid = false;
        }
         
        if (empty($birth_date)) {
            $birth_dateError = 'Please enter your Date of Birth';
            $valid = false;
      //email verification was here
        }
        if (empty($gender)) {
            $genderError = 'Please enter your Gender';
            $valid = false; 
        }
       if (empty($phone_number)) {
            $phone_numberError = 'Please enter your Phone Number';
            $valid = false;
        }
        if (empty($email_address)) {
            $email_addressError = 'Please enter your Email Address';
            $valid = false;
        }
        if (empty($permissions)) {
            $permissionsError = 'Please enter your Permissions';
            $valid = false;
        }
        if (empty($username)) {
            $usernameError = 'Please enter your Username';
            $valid = false;
        }
        if (empty($password)) {
            $passwordError = 'Please enter your Password';
            $valid = false;
        }
        
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customer set name = ?, birth_date = ?, gender =?, phone_number = ?, email_address = ?, permissions = ?, username = ?, password = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$birth_date,$gender,$phone_number,$email_address,$permissions,$username,$password,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        if(($data = $q->fetch(PDO::FETCH_ASSOC)) == false){
            header("Location: index.php");
        }
        $name = $data['name'];
        $birth_date = $data['birth_date'];
        $gender = $data['gender'];
        $phone_number = $data['phone_number'];
        $email_address = $data['email_address'];
        $permissions = $data['permissions'];
        $username = $data['username'];
        $password = $data['password'];
        Database::disconnect();
    }
?>

<?php
require_once 'includes/footer.php';
?>