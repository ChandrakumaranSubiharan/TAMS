<?php

class auth
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    // Log in registered customer with either their username or email and their password
    public function customerlogin($uname, $email, $pass)
    {
        try {
            // Define query to select values into the customer table
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



    // Log in registered partners with either their username or email and their password
    public function partnerlogin($uname, $email, $pass)
    {
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM tbl_partner WHERE username=:pname OR email_address=:pmail LIMIT 1";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":pname", $uname);
            $query->bindParam(":pmail", $email);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0) {

                // Check if partner account acivated or not

                if ($returned_row['status'] == 0) {
                    echo "<script>alert('sorry for the inconvenience your account has been not verified yet, please contact us or wait and try again.');
                window.location.href='../contact-us.php';
                </script>";
                }

                // Verify hashed password against entered password
                elseif (password_verify($pass, $returned_row['password'])) {
                    // Define session on successful login
                    $_SESSION['user_session'] = $returned_row['partner_id'];
                    return true;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    // Log in registered admins with either their username or email and their password
    public function adminlogin($uname, $email, $pass)
    {
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM tbl_admin WHERE username=:aname OR email=:amail LIMIT 1";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":aname", $uname);
            $query->bindParam(":amail", $email);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0) {

                // Check if partner account acivated or not

                if ($returned_row['status'] == 0) {
                    echo "<script>alert('sorry for the inconvenience your account has been deactivated, please contact your higher officer.');
                </script>";
                }

                // Verify hashed password against entered password
                elseif (password_verify($pass, $returned_row['password'])) {
                    // Define session on successful login
                    $_SESSION['user_session'] = $returned_row['admin_id'];
                    return true;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    // Check if the user is already logged in
    public function is_logged_in()
    {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    // Log out user
    public function log_out()
    {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }


    // Redirect user
    public function redirect($url)
    {
        header("Location: $url");
    }
}
