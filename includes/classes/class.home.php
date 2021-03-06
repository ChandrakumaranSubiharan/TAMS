<?php

class home
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert customer data into customer table
  public function insertData($home_name, $location_address, $adult_price, $kid_price, $max_adult, $max_kid, $lg_desc, $home_type, $home_room, $district, $province, $cancel, $str_date, $end_date, $str_time, $end_time, $file, $pid)
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

          $query = "INSERT INTO tbl_home(home_name, location_address, ava_night_price_adult, ava_night_price_kid, max_adults, max_kids, lg_desc, home_type, rooms, district, province, cancellation, ava_start_date, ava_end_date, s_time, e_time,status, cover_img1,partner_id)
                 VALUES('$home_name','$location_address','$adult_price','$kid_price','$max_adult','$max_kid','$lg_desc','$home_type','$home_room','$district','$province','$cancel','$str_date','$end_date','$str_time','$end_time','$sta','$fileNew','$pid')";
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


  // Fetch home records for show listing

  public function displayData()
  {
    $sql = "SELECT * FROM tbl_home ";
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



  public function displayDataAsPartner($pid)
  {
    $sql = "SELECT * FROM tbl_home WHERE partner_id = $pid ";
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
    $query = "SELECT * FROM tbl_home WHERE home_id = '$Id'";
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
    $query = "SELECT * FROM tbl_home WHERE home_id = '$Id'";
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

  // Home Updation
  public function update($id, $homename, $location, $aprice, $kprice, $madult, $mkid, $room, $des, $type, $province, $district, $cancell, $ava_start, $ava_end, $s_time, $e_time, $sta)
  {
    try {
      $stmt = $this->db->prepare("UPDATE tbl_home SET home_name=:hname,location_address=:address, 
                ava_night_price_adult=:aprice,ava_night_price_kid=:kprice,max_adults=:madult, 
                max_kids=:mkid,rooms=:room,lg_desc=:desc,home_type=:type,province=:pro,
                district=:distri,cancellation=:cancell,ava_start_date=:sdate,ava_end_date=:edate,
                s_time=:stime, e_time=:etime, status=:s WHERE home_id=:id ");
      $stmt->bindparam(":hname", $homename);
      $stmt->bindparam(":address", $location);
      $stmt->bindparam(":aprice", $aprice);
      $stmt->bindparam(":kprice", $kprice);
      $stmt->bindparam(":madult", $madult);
      $stmt->bindparam(":mkid", $mkid);
      $stmt->bindparam(":room", $room);
      $stmt->bindparam(":desc", $des);
      $stmt->bindparam(":type", $type);
      $stmt->bindparam(":pro", $province);
      $stmt->bindparam(":distri", $district);
      $stmt->bindparam(":cancell", $cancell);
      $stmt->bindparam(":sdate", $ava_start);
      $stmt->bindparam(":edate", $ava_end);
      $stmt->bindparam(":stime", $s_time);
      $stmt->bindparam(":etime", $e_time);
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  // Delete home data from home table
  public function deleteRecord($id)
  {
    try {
      $stmt = $this->db->prepare("DELETE FROM tbl_home WHERE home_id = '$id'");
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function home_update_after_booking($id, $sdate, $edate, $ncount)
  {

    $date1_ts = strtotime($sdate);
    $date2_ts = strtotime($edate);
    $diff = $date2_ts - $date1_ts;
    $Ava_Days = ($diff / 86400);

    if ($ncount == $Ava_Days) {

      $sta = false;

      try {
        $stmt = $this->db->prepare("UPDATE tbl_home SET 
                  status=:st
               WHERE home_id=:id ");
        $stmt->bindparam(":st", $sta);
        $stmt->bindparam(":id", $id);
        $stmt->execute();

        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    } else {

      $date = date_create("$sdate");

      // Use date_add() function to add date object
      date_add($date, date_interval_create_from_date_string("$ncount days"));

      $NewStDate = date_format($date, "Y-m-d");

      try {
        $stmt = $this->db->prepare("UPDATE tbl_home SET 
                ava_start_date=:sdate
               WHERE home_id=:id ");
        $stmt->bindparam(":sdate", $NewStDate);
        $stmt->bindparam(":id", $id);
        $stmt->execute();

        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }

  // Fetch home records for show listing
  public function HomeActiveData()
  {
    $sql = "SELECT * FROM tbl_home where status = 1 AND ava_start_date >= CURDATE() order by rand() LIMIT 4";
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

  public function HomebyDistrictData($district)
  {
    $sql = "SELECT * FROM tbl_home where status = 1 AND district = '$district' AND ava_start_date >= CURDATE() order by rand()";
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


  // Fetch single data for edit from HOME table
  public function displyaImgById($imgid)
  {

    $query = "SELECT cover_img1 FROM tbl_home WHERE home_id = '$imgid'";
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


  public function updateimg($id, $img)
  {
    try {

      move_uploaded_file($_FILES["image"]["tmp_name"], "includes/uploads/" . $_FILES["image"]["name"]);
      $stmt = $this->db->prepare("UPDATE tbl_home SET 
                cover_img1=:timage
             WHERE home_id=:id ");
      $stmt->bindparam(":timage", $img);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  // Home Searching Method
  public function HomeSearchData($Hdistrict, $Hsdate, $Hedate, $Hcadult, $Hckid, $Hcroom, $Hpricerange, $Htype)
  {
    $sql = "SELECT * from tbl_home WHERE status = 1 AND ava_start_date >= CURDATE()
    AND district = '$Hdistrict' 
    AND ava_start_date >= '$Hsdate' 
    AND ava_end_date >= '$Hedate' 
    AND max_adults >= '$Hcadult' 
    AND max_kids >= '$Hckid' 
    AND rooms >= '$Hcroom' 
    AND ava_night_price_adult <= '$Hpricerange'  
    AND home_type = '$Htype' order by rand() ";

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

  // Specific home reservation prices calculate method
  public function HomePriceCalculation($adultcount, $kidcount, $nightcount, $kidprice, $adultprice)
  {
    //get total persons
    $total_person_count = $adultcount + $kidcount;
    //get total amount for adults
    $sum_adults_price = $adultcount * $adultprice;
    $total_nights_adults_price = $nightcount * $sum_adults_price;
    //get total amount for kids
    $sum_kids_price = $kidcount * $kidprice;
    $total__nights_kids_price = $nightcount * $sum_kids_price;

    //get total amount
    $total_amount = $total_nights_adults_price + $total__nights_kids_price;
    //return as array
    return array(
      'total_person_count'    => $total_person_count,
      'total_adults_price' => $total_nights_adults_price,
      'total_kids_price' => $total__nights_kids_price,
      'total_amount' => $total_amount,
    );
  }


  public function GetHomesCount()
  {
    $sql = "SELECT home_id from tbl_home";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function updatestatusActive($id)
  {
    try {
      $sta = 1;
      $stmt = $this->db->prepare("UPDATE tbl_home SET 
                status=:st
             WHERE home_id=:id ");
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
      $stmt = $this->db->prepare("UPDATE tbl_home SET 
                status=:st
             WHERE home_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function PartnerGetHomeCount($pid)
  {
    $sql = "SELECT home_id from tbl_home WHERE partner_id = $pid AND status = 1";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function GetActiveHomeCount()
  {
    $sql = "SELECT home_id from tbl_home WHERE status = 1";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }


}
