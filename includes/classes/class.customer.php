<?php

class customer
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }


  // Method Register new customer
  public function create($fname, $lname, $address, $uname, $email, $contact, $pass)
  {
    try {
      // Hash password
      $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

      // Prepare the statement to insert values into the customer table

      $stmt = $this->db->prepare("INSERT INTO tbl_customer(first_name,last_name,address,username,email_address,contact_number,password,status) VALUES(:fname, :lname,:address,:uname,:email_id,:contact,:pass,:status)");

      // variable to fetch customer active/inactive status by bool value
      $sta = "1";

      // Bind parameters
      $stmt->bindparam(":fname", $fname);
      $stmt->bindparam(":lname", $lname);
      $stmt->bindparam(":address", $address);
      $stmt->bindparam(":uname", $uname);
      $stmt->bindparam(":email_id", $email);
      $stmt->bindparam(":contact", $contact);
      $stmt->bindparam(":pass", $user_hashed_password);
      $stmt->bindparam(":status", $sta);

      // Execute the query
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function GetCustomersCount()
  {
    $sql = "SELECT customer_id from tbl_customer";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }



  public function UpdateInfo($uname, $fname, $lname, $address, $email, $contact, $pass, $uid)
  {

    try {
      if ($pass == NULL) {
        $stmt = $this->db->prepare("UPDATE tbl_customer SET 
               first_name=:fname,
               last_name=:lname,
               username=:uname,
               address=:address,
               email_address=:mail,
               contact_number=:contact
            WHERE customer_id=:id ");
        $stmt->bindparam(":fname", $fname);
        $stmt->bindparam(":lname", $lname);
        $stmt->bindparam(":uname", $uname);
        $stmt->bindparam(":address", $address);
        $stmt->bindparam(":mail", $email);
        $stmt->bindparam(":contact", $contact);
        $stmt->bindparam(":id", $uid);
        $stmt->execute();
        return true;
      } else {
        // Hash password
        $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("UPDATE tbl_customer SET 
               first_name=:fname,
               last_name=:lname,
               username=:uname,
               address=:address,
               email_address=:mail,
               contact_number=:contact,
               password=:pass
            WHERE customer_id=:id ");
        $stmt->bindparam(":fname", $fname);
        $stmt->bindparam(":lname", $lname);
        $stmt->bindparam(":uname", $uname);
        $stmt->bindparam(":address", $address);
        $stmt->bindparam(":mail", $email);
        $stmt->bindparam(":pass", $user_hashed_password);
        $stmt->bindparam(":contact", $contact);
        $stmt->bindparam(":id", $uid);
        $stmt->execute();
        return true;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  // Fetch all data
  public function displayUserDataAll()
  {
    $sql = "SELECT * FROM tbl_customer";
    $query = $this->db->query($sql);
    $data = array();
    if ($query->rowCount() > 0) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
      return $data;
    } else {
      return false;
    }
  }


  public function updatestatusActive($editId)
  {
    try {
      $sta = 1;
      $stmt = $this->db->prepare("UPDATE tbl_customer SET 
                      status=:st
                   WHERE customer_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $editId);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function updatestatusDeactive($editId)
  {
    try {
      $sta = 0;
      $stmt = $this->db->prepare("UPDATE tbl_customer SET 
                      status=:st
                   WHERE customer_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $editId);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function DeleteUser($UId)
  {
    try {
      $stmt = $this->db->prepare("DELETE FROM tbl_customer
                   WHERE customer_id=:id ");
      $stmt->bindparam(":id", $UId);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function displyaRecordById($Id)
  {
      $query = "SELECT * FROM tbl_customer WHERE customer_id = '$Id'";
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
}
