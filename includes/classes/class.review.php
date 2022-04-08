<?php

class review
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }



    // Method Register new partner
    public function create_review($title, $des, $u_type, $rating, $cid, $sid, $name)
    {
        try {

            // Prepare the statement to insert values into the inquiry table

            $stmt = $this->db->prepare("INSERT INTO tbl_review(review_title, review_description, review_user_type, customer_id, service_id, review_rating, created_date, status, customer_name) VALUES(:title,:des,:type,:cid,:sid,:rate,:cdate,:status,:name)");

            // variable to fetch inquiry active/inactive status by bool value
            $sta = '0';

            // variable to fetch current date time
            $cdate = Date("y-m-d H:i:s");

            // Bind parameters
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":des", $des);
            $stmt->bindparam(":type", $u_type);
            $stmt->bindparam(":cid", $cid);
            $stmt->bindparam(":sid", $sid);
            $stmt->bindparam(":rate", $rating);
            $stmt->bindparam(":cdate", $cdate);
            $stmt->bindparam(":status", $sta);
            $stmt->bindparam(":name", $name);

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
      $cnt=$query->rowCount();
      return $cnt;
    }

}
