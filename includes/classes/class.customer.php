<?php

class customer
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 

 // Method Register new customer
 public function create($fname,$lname,$address,$uname,$email,$contact,$pass)
 {
  try
  {
    // Hash password
    $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    
    // Prepare the statement to insert values into the customer table

   $stmt = $this->db->prepare("INSERT INTO tbl_customer(first_name,last_name,address,username,email_address,contact_number,password,status,created_date) VALUES(:fname, :lname,:address,:uname,:email_id,:contact,:pass,:status,:date)");
   
    // variable to fetch customer active/inactive status by bool value
    $sta = "1";

    // variable to fetch current date time
    $regdate =Date("y-m-d H:i:s");

    // Bind parameters
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":address",$address);
   $stmt->bindparam(":uname",$uname);
   $stmt->bindparam(":email_id",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->bindparam(":pass",$user_hashed_password);
   $stmt->bindparam(":status",$sta);
   $stmt->bindparam(":date",$regdate);


    // Execute the query
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }


 public function GetCustomersCount()
 {
   $sql = "SELECT customer_id from tbl_customer";
   $query = $this->db->query($sql);
   $cnt=$query->rowCount();
   return $cnt;
 }


 
 public function UpdateInfo($uname,$fname,$lname,$address,$email,$contact,$pass,$uid)
 {

   try {

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
   } catch (PDOException $e) {
     echo $e->getMessage();
     return false;
   }
 }
 
}
