<?php

class auth
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }
 

 // Log in registered users with either their username or email and their password
 public function customerlogin($uname,$email,$pass)
 {
     try {
         // Define query to insert values into the users table
         $sql = "SELECT * FROM tbl_customer WHERE username=:uname OR email_address=:email LIMIT 1";

         // Prepare the statement
         $query = $this->db->prepare($sql);

         // Bind parameters
         $query->bindParam(":uname", $uname);
         $query->bindParam(":email", $email);

         // Execute the query
         $query->execute();

         // Return row as an array indexed by both column name
         $returned_row = $query->fetch(PDO::FETCH_ASSOC);

         // Check if row is actually returned
         if ($query->rowCount() > 0) {
             // Verify hashed password against entered password
             if (password_verify($pass, $returned_row['password'])) {
                 // Define session on successful login
                 $_SESSION['user_session'] = $returned_row['customer_id'];
                 return true;
             } 
         }
     } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
     }
 }

     // Redirect user
     public function redirect($url) {
        header("Location: $url");
    }
 
}
