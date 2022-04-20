<?php

class admin
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }



    // Method Register new admin
    public function create($fname, $uname, $pass, $contact, $staffid, $department, $email, $category)
    {
        try {
            // Hash password
            $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Prepare the statement to insert values into the admin table

            $stmt = $this->db->prepare("INSERT INTO tbl_admin(avatar,full_name,username,password,contact_number,staff_id,department,email,user_category,status) VALUES(:avatar,:fname,:uname,:pass,:contact,:staffid,:dep,:mail,:usercat,:status)");

            // variable to fetch customer active/inactive status by bool value
            $sta = "1";

            // variable to fetch null value
            $emty = NULL;

            // Bind parameters
            $stmt->bindparam(":avatar", $emty);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":pass", $user_hashed_password);
            $stmt->bindparam(":contact", $contact);
            $stmt->bindparam(":staffid", $staffid);
            $stmt->bindparam(":dep", $department);
            $stmt->bindparam(":mail", $email);
            $stmt->bindparam(":usercat", $category);
            $stmt->bindparam(":status", $sta);

            // Execute the query
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
