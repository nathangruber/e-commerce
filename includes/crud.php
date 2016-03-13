<?php

// helper function for validation


function valid($varname){
	if(empty($varname)){
		echo $varname.'is the problem1<br>';
		return false;
	}
	if(!isset($varname)){
		echo $varname.'is the superproblem2<br>';
		return false;
	}
	echo $varname.' works3<br>';
	return true;
	//return ( !empty($varname) && isset($varname) );
}

/*
class Database {

	private static $dbName = 'e-commerce' ; 
	private static $dbHost = 'localhost' ;
	private static $dbUsername = 'root';
	private static $dbUserPassword = 'blake811';
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect()
	{
	    // One connection through whole application
        if ( null == self::$cont ) {      
        	try {
          		self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  
          		self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
          		die($e->getMessage());  
        	}
        } 
       	return self::$cont;
	}
	
	public static function disconnect() {
		self::$cont = null;
	}
}

*/
class customer {	

	public function create($name, $birth_date, $gender, $phone_number, $email_address, $username, $password ){
		if (!valid($name) || !valid($birth_date) || !valid($gender) || !valid($phone_number) || !valid($email_address)|| !valid($username)|| !valid($password) ) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO customer (name,birth_date,gender,phone_number,email_address,username,password) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$birth_date,$gender,$phone_number,$email_address,$username,$password)); //asks db for info array is replacing ?info
			Database::disconnect();
			return true;
		}
	}

	public function read($customer_id){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM customer WHERE id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($customer_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){
			return NULL;
			//header( "Location: 500.php" );
			//echo $error->getMessage();
			//die();

		}

    }

	public function update($name, $birth_date, $gender, $phone_number, $email_address, $username, $customer_id){
		echo 'Received: '.$name.$birth_date.$gender.$phone_number.$email_address.$username.$customer_id.'<br>';
		$last_param = 'comeon';
		if (!valid($name) || !valid($birth_date) || !valid($gender) || !valid($phone_number) || !valid($email_address)|| !valid($username) || !valid($last_param) ) {
			echo 'one param is not valid';
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE customer SET name = ?, birth_date = ?, gender = ?, phone_number = ?, email_address = ?, username = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$birth_date,$gender,$phone_number,$email_address,$username,$customer_id));
				Database::disconnect();
				return true;
			}
		}

	public function delete($customer_id){

        $pdo = Database::connect();
        $sql = "DELETE FROM customer WHERE id = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($customer_id));
        Database::disconnect();
        return true;

	}

}
///////////////////////////////////
class customerAddress {	


	public $customer_id;


	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}

	public function create($street_1, $street_2, $city, $state, $zip_code ){
		if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code) ) {
			return false;
		} else {

			$pdo = Database::connect();
			$sql = "INSERT INTO address (street_1,street_2,city,state,zip_code) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($street_1,$street_2,$city,$state,$zip_code));
			$address_id = $pdo->lastInsertId();
			$sql = "INSERT INTO customer_address (address_fk, customer_fk) values(?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($address_id, $this->customer_id)); 
			
			Database::disconnect();
			return true;
		  
           //$query = $q->fetch(PDO::FETCH_ASSOC);
          // print_r($query);
           //echo $addressID;
         // die();
          
        
	}
}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM address WHERE id IN (SELECT address_fk FROM customer_address WHERE customer_fk = ?) ORDER BY id DESC';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
			die();

		}

    }

	public function update($street_1, $street_2, $city, $state, $zip_code, $address_id){
		if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code) ) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE address SET street_1 = ?, street_2 = ?, city = ?, state = ?, zip_code = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($street_1,$street_2,$city,$state,$zip_code,$address_id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($address_id){

        $pdo = Database::connect();
        $sql = "DELETE FROM customer_address WHERE address_fk = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($address_id));
        Database::disconnect();
        return true;

	}

}
/////////////////////////////////////////
class customerCreditcards {	


	public $customer_id;


	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}

	public function create($name, $cardnumber, $expiration_date, $security_code){
		if (!valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO  `E-Commerce`.`creditcard` (`name` ,`cardnumber` ,`expiration_date` ,`security_code` ,`customer_fk`) VALUES (?, ?, ?,?,?);";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$cardnumber,$expiration_date,$security_code,$this->customer_id));
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM creditcard WHERE id IN (SELECT creditcard_fk FROM customer_creditcard WHERE customer_fk = ?) ORDER BY id DESC';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
	        Database::disconnect();
	        return $data;
			} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
			die();

		}

    }

	public function update($name, $cardnumber, $expiration_date, $security_code, $address_id){
		if (!valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code)) {
			return false;
			} else {
			$pdo = Database::connect();
			$sql = "UPDATE creditcard SET name = ?, cardnumber = ?, expiration_date = ?, security_code, address_fk = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$cardnumber,$expiration_date,$security_code,$address_fk,$id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($creditcard_id){
	  try{
        $pdo = Database::connect();
        $sql = "DELETE FROM `e-commerce`.`customer_creditcard` WHERE `creditcard_fk` = ? AND `customer_fk` = ?"; //taken from SQL query on phpMyAdmin
        $q = $pdo->prepare($sql);
        $q->execute(array($creditcard_id, $this->customer_id));
        Database::disconnect();
        return true;
     	}catch (PDOException $error){
		echo $error->getMessage();
		return false;
		}
	}
}
/////////////////////////////////////////////