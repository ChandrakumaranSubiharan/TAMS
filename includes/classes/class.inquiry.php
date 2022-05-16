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

            $stmt = $this->db->prepare("INSERT INTO tbl_inquiry(enquirer_name,enquirer_email,enquirer_contact,enquirer_subject,enquirer_descr,status) VALUES(:name,:mail,:contact,:subject,:descr,:status)");

            // variable to fetch inquiry active/inactive status by bool value
            $sta = '0';

            // Bind parameters
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":mail", $email);
            $stmt->bindparam(":contact", $contact);
            $stmt->bindparam(":subject", $subject);
            $stmt->bindparam(":descr", $message);
            $stmt->bindparam(":status", $sta);


            // Execute the query
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function displayReviewsAll()
    {
        $sql = "SELECT * FROM tbl_inquiry";
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



    public function updatestatusApprove($editId)
    {
        try {
            $sta = 1;
            $stmt = $this->db->prepare("UPDATE tbl_inquiry SET 
                      status=:st
                   WHERE inquiry_id=:id ");
            $stmt->bindparam(":st", $sta);
            $stmt->bindparam(":id", $editId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatestatusDisapprove($editId)
    {
        try {
            $sta = 0;
            $stmt = $this->db->prepare("UPDATE tbl_inquiry SET 
                      status=:st
                   WHERE inquiry_id=:id ");
            $stmt->bindparam(":st", $sta);
            $stmt->bindparam(":id", $editId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function displyaRecordById($Id)
    {
        $query = "SELECT * FROM tbl_inquiry WHERE inquiry_id = '$Id'";
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


    public function CntPendingEnquire()
    {
        $sql = "SELECT inquiry_id from tbl_inquiry WHERE status = 0";
        $query = $this->db->query($sql);
        $cnt = $query->rowCount();
        return $cnt;
    }
}
