<?php

class partner
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }



  // Method Register new partner
  public function create($fname, $lname, $address, $uname, $email, $contact, $pass, $province, $zipcode, $gender)
  {
    try {
      // Hash password
      $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

      // Prepare the statement to insert values into the customer table

      $stmt = $this->db->prepare("INSERT INTO tbl_partner(avatar,first_name,last_name,address,username,email_address,contact_number,password,status,province,zipcode,gender,created_date) VALUES(:avatar,:fname, :lname,:address,:uname,:email_id,:contact,:pass,:status,:province,:zipcode,:gender,:date)");

      // variable to fetch customer active/inactive status by bool value
      $sta = "0";

      // variable to fetch current date time
      $regdate = Date("y-m-d H:i:s");

      // variable to fetch null value
      $emty = NULL;

      // Bind parameters
      $stmt->bindparam(":avatar", $emty);
      $stmt->bindparam(":fname", $fname);
      $stmt->bindparam(":lname", $lname);
      $stmt->bindparam(":address", $address);
      $stmt->bindparam(":uname", $uname);
      $stmt->bindparam(":email_id", $email);
      $stmt->bindparam(":contact", $contact);
      $stmt->bindparam(":pass", $user_hashed_password);
      $stmt->bindparam(":status", $sta);
      $stmt->bindparam(":province", $province);
      $stmt->bindparam(":zipcode", $zipcode);
      $stmt->bindparam(":gender", $gender);
      $stmt->bindparam(":date", $regdate);

      // Execute the query
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  // Fetch single data for edit from home table
  public function displyaRecordByIdviaArray($Id)
  {
    $query = "SELECT * FROM tbl_partner WHERE partner_id = $Id";
    $result = $this->db->query($query);
    $data = array();

    if ($result->rowCount() > 0) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
      return $data;
    } else {
      return false;
    }
  }

  // Fetch single data for edit from tour table
  public function displyaRecordById($Id)
  {
    $query = "SELECT * FROM tbl_partner WHERE partner_id = '$Id'";
    $result = $this->db->query($query);
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data = $row;
      }
      return $data;
    } else {
      echo "Record not found";
    }
  }



  public function update($id, $fname, $lname, $uname, $pass, $mail, $contact, $address, $zip, $province, $gender)
  {

    try {

// Hash password
$user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

      $stmt = $this->db->prepare("UPDATE tbl_partner SET 
                first_name=:fname,
                last_name=:lname,
                username=:uname,
                address=:address,
                email_address=:mail,
                password=:pass,
                contact_number=:contact,
                gender=:gender,
                zipcode=:zipcode,
                province=:province
             WHERE partner_id=:id ");
      $stmt->bindparam(":fname", $fname);
      $stmt->bindparam(":lname", $lname);
      $stmt->bindparam(":uname", $uname);
      $stmt->bindparam(":address", $address);
      $stmt->bindparam(":mail", $mail);
      $stmt->bindparam(":pass", $user_hashed_password);
      $stmt->bindparam(":contact", $contact);
      $stmt->bindparam(":gender", $gender);
      $stmt->bindparam(":zipcode", $zip);
      $stmt->bindparam(":province", $province);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}
