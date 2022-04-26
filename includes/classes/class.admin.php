<?php

class admin
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    // Method Register new admin
    public function create($fullname, $username, $email, $contact, $staffid, $department, $password)
    {
        try {
            // Hash password
            $user_hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the statement to insert values into the admin table

            $stmt = $this->db->prepare("INSERT INTO tbl_admin(full_name,username,password,contact_number,staff_id,department,email,status) VALUES(:fname,:uname,:pass,:contact,:staffid,:dep,:mail,:status)");

            // variable to fetch customer active/inactive status by bool value
            $sta = "1";

            // Bind parameters
            $stmt->bindparam(":fname", $fullname);
            $stmt->bindparam(":uname", $username);
            $stmt->bindparam(":pass", $user_hashed_password);
            $stmt->bindparam(":contact", $contact);
            $stmt->bindparam(":staffid", $staffid);
            $stmt->bindparam(":dep", $department);
            $stmt->bindparam(":mail", $email);
            $stmt->bindparam(":status", $sta);

            // Execute the query
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    // Fetch single data for edit from tour table
    public function displyaRecordById($Id)
    {
        $query = "SELECT * FROM tbl_admin WHERE admin_id = '$Id'";
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


    public function update($id, $fname, $uname, $pass, $mail, $contact)
    {
        try {
            if ($pass == NULL) {
                $stmt = $this->db->prepare("UPDATE tbl_admin SET 
                full_name=:fname,
                username=:uname,
                email=:mail,
                contact_number=:contact
             WHERE admin_id =:id");
                $stmt->bindparam(":fname", $fname);
                $stmt->bindparam(":uname", $uname);
                $stmt->bindparam(":mail", $mail);
                $stmt->bindparam(":contact", $contact);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            } else {
                // Hash password
                $user_hashed_password = password_hash($pass, PASSWORD_DEFAULT);

                $stmt = $this->db->prepare("UPDATE tbl_admin SET 
                    full_name=:fname,
                    username=:uname,
                    email=:mail,
                    password=:pass,
                    contact_number=:contact
                WHERE admin_id =:id");
                $stmt->bindparam(":fname", $fname);
                $stmt->bindparam(":uname", $uname);
                $stmt->bindparam(":mail", $mail);
                $stmt->bindparam(":pass", $user_hashed_password);
                $stmt->bindparam(":contact", $contact);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    // Fetch users records for show listing

    public function displayUserData()
    {
        $sql = "SELECT * FROM tbl_admin";
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
            $stmt = $this->db->prepare("UPDATE tbl_admin SET 
                      status=:st
                   WHERE admin_id=:id ");
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
            $stmt = $this->db->prepare("UPDATE tbl_admin SET 
                      status=:st
                   WHERE admin_id=:id ");
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
            $stmt = $this->db->prepare("DELETE FROM tbl_admin
                   WHERE admin_id=:id ");
            $stmt->bindparam(":id", $UId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
