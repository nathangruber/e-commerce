<?php

// helper function for validation
function valid($varname){
	return ( !empty($varname) && isset($varname) );
}

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
		if (!valid($name) || !valid($birth_date) || !valid($gender) || !valid($phone_number) || !valid($email_address)|| !valid($username) || !valid($customer_id) ) {
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

class customerAddress {
	public $customer_id;

	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}

	public function create($street_1, $street_2, $city, $state, $zip_code, $customer_id){
		if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code) ) {
			return false;
		} else {

			$pdo = Database::connect();
			$sql = "INSERT INTO  `E-Commerce`.`address` (`street_1` ,`street_2` ,`city` ,`state` ,`zip_code` ,`customer_fk`) VALUES (?,?,?,?,?,?);";
			$q = $pdo->prepare($sql);
			$q->execute(array($street_1,$street_2,$city,$state,$zip_code,$this->customer_id));

			Database::disconnect();
			return true;
		}
	}

	public function getNumOfAddress(){
		try{
			$pdo = Database::connect();
			$sql = "SELECT count(*) as numaddress FROM address where customer_fk = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data['numaddress'];
		} catch (PDOException $error){

			header( "Location: 500.php" );
			die();

		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM address where customer_fk = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			die();

		}
	}

	public function readAnAddress($address_id){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM address where customer_fk = ? and id=?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id,$address_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			die();

		}
	}



	public function update($street_1, $street_2, $city, $state, $zip_code, $address_id){
		if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code) || !valid($address_id) ) {
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
		$sql = "DELETE FROM address WHERE id = ?"; //taken from SQL query on phpMyAdmin
		$q = $pdo->prepare($sql);
		$q->execute(array($address_id));
		Database::disconnect();
		return true;

	}
}

class customerCreditcards {


	public $customer_id;


	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM creditcard where customer_fk = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			die();

		}
	}

	public function readACreditCard($creditcard_id){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM creditcard where customer_fk = ? and id=?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id,$creditcard_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			die();

		}
	}

	public function create($name, $cardnumber, $expiration_date, $security_code, $address_id){
		if (!valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code) || !valid($address_id)) {
			return false;
		} else {
			echo 'php arrives here...';
			$pdo = Database::connect();
			$sql = "INSERT INTO  `E-Commerce`.`creditcard` (`name` ,`cardnumber` ,`expiration_date` ,`security_code` ,`customer_fk` ,`address_fk`) VALUES (?, ?, ?, ?, ?, ?);";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$cardnumber,$expiration_date,$security_code,$this->customer_id,$address_id));
			Database::disconnect();
			return true;
		}
	}



	public function update($id,$name, $cardnumber, $expiration_date, $security_code, $address_fk){
		if (!valid($id) ||!valid($name) || !valid($cardnumber) || !valid($expiration_date) || !valid($security_code) || !valid($address_fk)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE creditcard SET name = ?, cardnumber = ?, expiration_date = ?, security_code = ?, address_fk = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$cardnumber,$expiration_date,$security_code,$address_fk,$id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($creditcard_id){
		try{
			$pdo = Database::connect();
			$sql = "DELETE FROM creditcard WHERE id=? and customer_fk = ?"; //taken from SQL query on phpMyAdmin
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

class product {

	public $product_id;



	public function __construct($product_id){
		$this->product_id = $product_id;
	}

	public function create($product_name, $description, $price, $category_fk){
		if (!valid($product_name) || !valid($description) || !valid($price) || !valid($category_fk)) {
			return false;
		} else {
			try{
				$pdo = Database::connect();
				$sql = "INSERT INTO  `E-Commerce`.`product` (`product_name` ,`description` ,`price` ,`category_fk`) VALUES (?, ?, ?, ?);";
				$q = $pdo->prepare($sql);
				$q->execute(array($product_name,$description,$price,$category_fk));
				$product_id = $pdo->lastInsertId();

				$sql = "INSERT INTO product_bin (product_FK,bin_FK) values(?, ?)";
				$q = $pdo->prepare($sql);
				$q->execute(array($product_id,$bin_FK));

				Database::disconnect();
				return true;
			} catch(PDOException $error) {
				echo $error->getMessage();
			}
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM product where id = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->product_id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
		}
	}



	public function readAllCategory($category_id){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM product where category_fk = ?';
			$q = $pdo->prepare($sql);
			$q->execute(array($category_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){

			header( "Location: 500.php" );
			//echo $error->getMessage();
		}
	}

	public function delete($product_id){
		try{
			$pdo = Database::connect();
			$sql = "DELETE FROM product WHERE id=?"; //taken from SQL query on phpMyAdmin
			$q = $pdo->prepare($sql);
			$q->execute(array($product_id));
			Database::disconnect();
			return true;
		}catch (PDOException $error){
			echo $error->getMessage();
			die();
			//return false;
		}
	}
}

class category {



	public function create($name){
		if (!valid($name)) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO category (name) values(?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name)); //asks db for info array is replacing ?info
			$category_id = $pdo->lastInsertId();
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT * FROM category ORDER BY name';
			$q = $pdo->prepare($sql);
			$q->execute(array());
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
			//$data = $pdo->query($sql);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			//echo $error->getMessage();
			//die();

		}
	}


	public function update($name, $category_id){
		if (!valid($name) ) {
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "UPDATE category SET name = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$category_id));
			Database::disconnect();
			return true;
		}
	}

	public function delete($category_id){

		$pdo = Database::connect();
		$sql = "DELETE FROM category WHERE id = ?"; //taken from SQL query on phpMyAdmin
		$q = $pdo->prepare($sql);
		$q->execute(array($category_id));
		Database::disconnect();
		return true;

	}
}



class cart{
	public $customer_id;

	public function __construct($customer_id){
		$this->customer_id = $customer_id;
	}


	public function addCart($product_id){
		if (!valid($product_id)){
			return false;
		} else {
			$pdo = Database::connect();
			$sql = "INSERT INTO  `E-Commerce`.`cart` (`customer_fk` ,`product_fk`) VALUES (?,  ?);";
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id,$product_id));
			Database::disconnect();
			return true;
		}
	}

	public function read(){
		try{
			$pdo = Database::connect();
			$sql = 'SELECT product_fk, count(product_fk) as quantity FROM `cart` WHERE customer_fk=? group by product_fk';
			$q = $pdo->prepare($sql);
			$q->execute(array($this->customer_id));
			$data = $q->fetchAll(PDO::FETCH_ASSOC);
			Database::disconnect();
			return $data;
		} catch (PDOException $error){
			header( "Location: 500.php" );
			die();

		}
	}

	public function updateQuantity($type,$product_id){
		if (!valid($type) || !valid($product_id)) {
			return false;
		} else {

			try{

				if($type=='less'){
					$pdo = Database::connect();
					$sql = "DELETE FROM cart WHERE customer_fk=? and product_fk=? limit 1";
					$q = $pdo->prepare($sql);
					$q->execute(array($this->customer_id,$product_id));

					Database::disconnect();
					return true;
				}else{
					$pdo = Database::connect();
					$sql = "INSERT INTO  `E-Commerce`.`cart` (`customer_fk` ,`product_fk`) VALUES (?,  ?);";
					$q = $pdo->prepare($sql);
					$q->execute(array($this->customer_id,$product_id));

					Database::disconnect();
					return true;
				}
			}catch(PDOException $error){
				echo $error->getMessage();
			}
		}
	}

	public function removeOneItem($product_id){
		if (!valid($product_id)) {
			return false;
		} else {

			try{


				$pdo = Database::connect();
				$sql = "DELETE FROM cart WHERE customer_fk=? and product_fk=?";
				$q = $pdo->prepare($sql);
				$q->execute(array($this->customer_id,$product_id));

				Database::disconnect();
				return true;

			}catch(PDOException $error){
				echo $error->getMessage();
			}
		}
	}


}
