<?php

class customer
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 
 public function create($fname,$lname,$address,$uname,$email,$contact,$pass)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO tbl_customer(first_name,last_name,address,username,email_address,contact_number,password) VALUES(:fname, :lname,:address,:uname,:email_id,:contact,:pass)");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":address",$address);
   $stmt->bindparam(":uname",$uname);
   $stmt->bindparam(":email_id",$email);
   $stmt->bindparam(":contact",$contact);
   $stmt->bindparam(":pass",$pass);
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

