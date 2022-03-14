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

   $stmt = $this->db->prepare("INSERT INTO tbl_customer(first_name,last_name,address,username,email_address,contact_number,password) VALUES(:fname, :lname,:address,:uname,:email_id,:contact,:pass)");
   
    // Bind parameters
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":address",$address);
   $stmt->bindparam(":uname",$uname);
   $stmt->bindparam(":email_id",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->bindparam(":pass",$user_hashed_password);

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
 
}
