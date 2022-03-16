<?php

class inquiry
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }



    // Method Register new partner
    public function create_enquiry($name, $email, $contact, $subject, $message)
    {
        try {

            // Prepare the statement to insert values into the inquiry table

            $stmt = $this->db->prepare("INSERT INTO tbl_inquiry(enquirer_name,enquirer_email,enquirer_contact,enquirer_subject,enquirer_descr,inquiry_received_date,status) VALUES(:name,:mail,:contact,:subject,:descr,:rdate,:status)");

            // variable to fetch inquiry active/inactive status by bool value
            $sta = '0';

            // variable to fetch current date time
            $rdate = Date("y-m-d H:i:s");

            // Bind parameters
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":mail", $email);
            $stmt->bindparam(":contact", $contact);
            $stmt->bindparam(":subject", $subject);
            $stmt->bindparam(":descr", $message);
            $stmt->bindparam(":rdate", $rdate);
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
