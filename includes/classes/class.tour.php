<?php

class tour
{

  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }


  // Insert tour data into tour table
  public function insertData($tour_title, $tour_location, $adult_price, $kid_status, $kid_price, $file, $tour_details, $tour_duration, $tour_type, $ava_seats, $tour_language, $district, $cancel, $str_date ,$str_time, $end_date ,$end_time ,$g_location ,$pid)
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
          $sta = "2";

          $query = "INSERT INTO tbl_tour(title,details,location,tour_type,duration_nights,adult_price,kid_status,kid_price,image,partner_id,status,language,district,availabile_seats,ava_start_date,s_time,ava_end_date,e_time,gathering_location,cancellation)
                    VALUES('$tour_title','$tour_details','$tour_location','$tour_type','$tour_duration','$adult_price','$kid_status','$kid_price','$fileNew','$pid','$sta','$tour_language','$district','$ava_seats','$str_date','$str_time','$end_date','$end_time','$g_location','$cancel')";
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

  // Fetch tour records for show listing
  public function displayDataAsPartner($pid)
  {
    $sql = "SELECT * FROM tbl_tour WHERE partner_id = $pid";
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


  // Fetch single data for edit from home table
  public function displyaRecordByIdviaArray($Id)
  {
    $query = "SELECT * FROM tbl_tour WHERE tour_id = '$Id'";
    $result = $this->db->query($query);
    $data = array();

    if ($result->rowCount() > 0) {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
      return $data;
    } else {
      return false;
    }
  }

  // Fetch single data for edit from tour table
  public function displyaRecordById($Id)
  {
    $query = "SELECT * FROM tbl_tour WHERE tour_id = '$Id'";
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

  public function update($id, $tourtitle, $location, $price, $k_status, $k_price, $des, $duration, $type, $avaseats, $glocation, $language, $district, $cancell, $ava_start, $start_time, $ava_end, $end_time, $sta)
  {
    try {
      $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                title=:ttitle, 
                location=:location, 
                adult_price=:price, 
                kid_status=:kid_status,
                kid_price=:kid_price,
                details=:desc,
                tour_type=:type,
                duration_nights=:duration,
                availabile_seats=:seats,
                gathering_location=:glocation,
                language=:lan,
                district=:distri,
                cancellation=:cancell,
                ava_start_date=:sdate,
                s_time=:stime,
                ava_end_date=:edate,
                e_time=:etime,
                status=:st
             WHERE tour_id=:id ");
      $stmt->bindparam(":ttitle", $tourtitle);
      $stmt->bindparam(":location", $location);
      $stmt->bindparam(":price", $price);
      $stmt->bindparam(":kid_status", $k_status);
      $stmt->bindparam(":kid_price", $k_price);
      $stmt->bindparam(":desc", $des);
      $stmt->bindparam(":type", $type);
      $stmt->bindparam(":duration", $duration);
      $stmt->bindparam(":seats", $avaseats);
      $stmt->bindparam(":glocation", $glocation);
      $stmt->bindparam(":lan", $language);
      $stmt->bindparam(":distri", $district);
      $stmt->bindparam(":cancell", $cancell);
      $stmt->bindparam(":sdate", $ava_start);
      $stmt->bindparam(":stime", $start_time);
      $stmt->bindparam(":edate", $ava_end);
      $stmt->bindparam(":etime", $end_time);
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function updateimg($id, $img)
  {
    try {

      move_uploaded_file($_FILES["image"]["tmp_name"], "includes/uploads/" . $_FILES["image"]["name"]);
      $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                image=:timage
             WHERE tour_id=:id ");
      $stmt->bindparam(":timage", $img);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function deleteRecord($id)
  {
    try {
      $stmt = $this->db->prepare("DELETE FROM tbl_tour WHERE tour_id = '$id'");
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  // Fetch tour records for show listing
  public function TourActiveData()
  {
    $sql = "SELECT * FROM tbl_tour where status = 1 AND ava_start_date >= CURDATE() order by rand() limit 4";
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


  public function TourActiveListedData()
  {
    $sql = "SELECT * FROM tbl_tour where status = 1 AND ava_start_date >= CURDATE() order by rand()";
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


  // Fetch home records by district

  public function TourbyDistrictData($district)
  {
    $sql = "SELECT * FROM tbl_tour where status = 1 AND district = '$district' AND ava_start_date >= CURDATE() order by rand()";
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

  // Fetch tour records for show listing
  public function TourSearchData($tdistrict, $tsdate, $tlanguage, $tpricerange, $ttype)
  {
    $sql = "SELECT * FROM tbl_tour where status = 1 
      AND district = '$tdistrict' 
         AND ava_start_date >= '$tsdate' 
         AND language = '$tlanguage' 
         AND adult_price <= '$tpricerange' 
         AND availabile_seats >= 1
         AND tour_type = '$ttype' order by rand() ";

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



  public function TourPriceCalculation($tcadult, $tckid, $tcprice)
  {


    $person_sum = $tcadult + $tckid;

    $kid_price = $tcprice / 2;

    $adults_sum_price = $tcadult * $tcprice;
    $kids_sum_price = $tckid * $kid_price;
    $total_amount = $adults_sum_price + $kids_sum_price;

    return array(
      'adults_price'    => $adults_sum_price,
      'kids_price' => $kids_sum_price,
      'person_sum' => $person_sum,
      'total_amount' => $total_amount,
      'kid_price' => $kid_price
    );
  }


  public function tour_update_after_booking($serviceid, $total_persons_count, $availabile_seats)
  {

    $avaseats = $availabile_seats - $total_persons_count;

    if ($total_persons_count < $availabile_seats) {

      try {
        $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                  availabile_seats=:avaseats
               WHERE tour_id=:id ");
        $stmt->bindparam(":avaseats", $avaseats);
        $stmt->bindparam(":id", $serviceid);
        $stmt->execute();

        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    } elseif ($total_persons_count == $availabile_seats) {

      $sta = "0";

      try {
        $stmt = $this->db->prepare("UPDATE tbl_tour SET 
        
                  availabile_seats=:avaseats,
                  status=:sta
               WHERE tour_id=:id ");
        $stmt->bindparam(":avaseats", $avaseats);
        $stmt->bindparam(":sta", $sta);
        $stmt->bindparam(":id", $serviceid);
        $stmt->execute();

        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    } else {

      return false;
    }
  }



  public function GetToursCount()
  {
    $sql = "SELECT tour_id from tbl_tour";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function updatestatusActive($id)
  {
    try {
      $sta = 1;
      $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                status=:st
             WHERE tour_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function updatestatusDeactive($id)
  {
    try {
      $sta = 0;
      $stmt = $this->db->prepare("UPDATE tbl_tour SET 
                status=:st
             WHERE tour_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function PartnerGetTourCount($pid)
  {
    $sql = "SELECT tour_id from tbl_tour WHERE partner_id = $pid AND status = 1";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function GetActiveTourCount()
  {
    $sql = "SELECT tour_id from tbl_tour WHERE status = 1";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }
}
