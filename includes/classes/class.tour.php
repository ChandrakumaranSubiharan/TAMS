<?php

class tour
{

  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }


  // Insert tour data into tour table
  public function insertData($tour_title, $tour_location, $adult_price, $file, $tour_details, $tour_duration, $tour_type, $ava_seats, $tour_language, $district, $cancel, $str_date, $end_date, $pid)
  {
    $allow = array('jpg', 'jpeg', 'png');
    $exntension = explode('.', $file['name']);
    $fileActExt = strtolower(end($exntension));
    $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
    $filePath = 'includes/uploads/' . $fileNew;

    if (in_array($fileActExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        if (move_uploaded_file($file['tmp_name'], $filePath)) {

          // variable to fetch home active/inactive status by bool value
          $sta = "0";

          // variable to fetch current date time
          $cdate = Date("y-m-d H:i:s");

          // variable to fetch null value
          $emty = NULL;

          $query = "INSERT INTO tbl_tour(title,details,location,tour_type,duration_days,adult_price,image,created_date,partner_id,status,language,district,availabile_seats,ava_start_date,ava_end_date,cancellation)
                    VALUES('$tour_title','$tour_details','$tour_location','$tour_type','$tour_duration','$adult_price','$fileNew','$cdate','$pid','$sta','$tour_language','$district','$ava_seats','$str_date','$end_date','$cancel')";
          $sql = $this->db->query($query);
          if ($sql == true) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }



  // Fetch tour records for show listing
  public function displayData()
  {
    $sql = "SELECT * FROM tbl_tour";
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


  // Fetch single data for edit from tour table
  public function displyaRecordById($editId)
  {
    $query = "SELECT * FROM tbl_tour WHERE tour_id = '$editId'";
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

    // Fetch single data for edit from tour table
    public function displyaImgById($imgid)
    {

      $query = "SELECT image FROM tbl_tour WHERE tour_id = '$imgid'";
      $result = $this->db->query($query);
      if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $imgdata = $row;
        }
        return $imgdata;
      } else {
        echo "Image not found";
      }
    }

  public function update($id,$tourtitle,$location,$price,$des,$duration,$type,$avaseats,$language,$district,$cancell,$ava_start,$ava_end,$sta)
  {
    try {
      $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                title=:ttitle, 
                location=:location, 
                adult_price=:price, 
                details=:desc,
                tour_type=:type,
                duration_days=:duration,
                availabile_seats=:seats,
                language=:lan,
                district=:distri,
                cancellation=:cancell,
                ava_start_date=:sdate,
                ava_end_date=:edate,
                status=:st
             WHERE tour_id=:id ");
      $stmt->bindparam(":ttitle", $tourtitle);
      $stmt->bindparam(":location", $location);
      $stmt->bindparam(":price", $price);
      $stmt->bindparam(":desc", $des);
      $stmt->bindparam(":type", $type);
      $stmt->bindparam(":duration", $duration);
      $stmt->bindparam(":seats", $avaseats);
      $stmt->bindparam(":lan", $language);
      $stmt->bindparam(":distri", $district);
      $stmt->bindparam(":cancell", $cancell);
      $stmt->bindparam(":sdate", $ava_start);
      $stmt->bindparam(":edate", $ava_end);
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }
}
