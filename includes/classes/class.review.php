<?php

class review
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }



    // Method Register new partner
    public function create_review($title, $des, $u_type, $rating, $cid, $sid, $servicename)
    {
        try {

            // Prepare the statement to insert values into the inquiry table

            $stmt = $this->db->prepare("INSERT INTO tbl_review(review_title, review_description, review_user_type, customer_id, service_id, review_rating, status, service_name) VALUES(:title,:des,:type,:cid,:sid,:rate,:status,:sname)");

            // variable to fetch inquiry active/inactive status by bool value
            $sta = '0';

            // Bind parameters
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":des", $des);
            $stmt->bindparam(":type", $u_type);
            $stmt->bindparam(":cid", $cid);
            $stmt->bindparam(":sid", $sid);
            $stmt->bindparam(":rate", $rating);
            $stmt->bindparam(":status", $sta);
            $stmt->bindparam(":sname", $servicename);

            // Execute the query
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function displayReviews($sid)
    {
        $sql = "SELECT * FROM tbl_review where status = 1 AND service_id = $sid ";
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

    public function displayReviewsLimit($sid)
    {
        $sql = "SELECT * FROM tbl_review where status = 1 AND service_id = $sid order by rand() LIMIT 3 ";
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

    public function GetReviewsCount($sid)
    {
        $sql = "SELECT review_id from tbl_review WHERE status = 1 AND service_id = $sid";
        $query = $this->db->query($sql);
        $cnt = $query->rowCount();
        return $cnt;
    }


    public function displayReviewsAll()
    {
        $sql = "SELECT DISTINCT 
    tbl_review.review_id, 
    tbl_review.review_title, 
    tbl_review.review_description,
    tbl_review.review_user_type, 
    tbl_review.review_rating, 
    tbl_review.created_date,
    tbl_review.approved_date,
    tbl_review.status,
    tbl_customer.customer_id, 
    tbl_customer.first_name, 
    tbl_customer.last_name 
    from tbl_review 
    join tbl_customer on tbl_review.customer_id=tbl_customer.customer_id 
    order by created_date desc";
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
            $stmt = $this->db->prepare("UPDATE tbl_review SET 
                      status=:st
                   WHERE review_id=:id ");
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
            $stmt = $this->db->prepare("UPDATE tbl_review SET 
                      status=:st
                   WHERE review_id=:id ");
            $stmt->bindparam(":st", $sta);
            $stmt->bindparam(":id", $editId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function DeleteReview($UId)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM tbl_review
                   WHERE review_id=:id ");
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
        $query = "SELECT DISTINCT 
      tbl_review.review_id, 
      tbl_review.review_title, 
      tbl_review.review_description,
      tbl_review.review_user_type, 
      tbl_review.service_id, 
      tbl_review.service_name, 
      tbl_review.review_rating, 
      tbl_review.created_date,
      tbl_review.approved_date,
      tbl_review.status,
      tbl_customer.customer_id, 
      tbl_customer.first_name, 
      tbl_customer.last_name 
      from tbl_review 
      join tbl_customer on tbl_review.customer_id=tbl_customer.customer_id 
      WHERE review_id = '$Id'
      order by created_date desc";
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
