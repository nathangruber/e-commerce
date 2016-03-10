<?php
public function update($street_1, $street_2, $city, $state, $zip_code, $addy_id){
    if (!valid($street_1) || !valid($street_2) || !valid($city) || !valid($state) || !valid($zip_code)) {
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
        $q->execute(array($addy_id));
        Database::disconnect();
        return true;

  }

}

  ?>