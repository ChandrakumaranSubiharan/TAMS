<?php

class home
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert customer data into customer table
  public function insertData($home_name, $location_address, $ava_night_price, $lg_desc, $home_type, $home_room, $extra_people, $district, $province, $cancel, $str_date, $end_date, $file, $pid)
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


          $query = "INSERT INTO tbl_home(home_name, location_address, ava_night_price, lg_desc, home_type, rooms, extra_people, district, province, cancellation, ava_start_date, ava_end_date,created_date,status, cover_img1,partner_id)
                 VALUES('$home_name','$location_address','$ava_night_price','$lg_desc','$home_type','$home_room','$extra_people','$district','$province','$cancel','$str_date','$end_date','$cdate','$sta','$fileNew','$pid')";
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
    $sql = "SELECT * FROM tbl_home";
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


  public function update($id, $homename, $location, $price, $des, $type, $people, $province, $district, $cancell, $ava_start, $ava_end, $sta)
  {
    try {
      $stmt = $this->db->prepare("UPDATE tbl_home SET 
                home_name=:hname, 
                location_address=:address, 
                ava_night_price=:price, 
                lg_desc=:desc,
                home_type=:type,
                extra_people=:people,
                province=:pro,
                district=:distri,
                cancellation=:cancell,
                ava_start_date=:sdate,
                ava_end_date=:edate,
                status=:st
             WHERE home_id=:id ");
      $stmt->bindparam(":hname", $homename);
      $stmt->bindparam(":address", $location);
      $stmt->bindparam(":price", $price);
      $stmt->bindparam(":desc", $des);
      $stmt->bindparam(":type", $type);
      $stmt->bindparam(":people", $people);
      $stmt->bindparam(":pro", $province);
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

  // Delete customer data from home table
  public function deleteRecord($id)
  {
    $stmt = $this->db->prepare("DELETE FROM tbl_home WHERE home_id = '$id'");
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    if ($stmt == true) {
      header("Location:manage-home.php?msg3=delete");
    } else {
      echo "Record does not delete try again";
    }
  }


  // Update Status data from home table
  public function activeRecord($id)
  {
    $stmt = $this->db->prepare("UPDATE tbl_home SET 
      status=:sta
      WHERE home_id=:id ");
    $sta = 1;
    $stmt->bindparam(":sta", $sta);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    if ($stmt == true) {
      header("Location:manage-home.php?msg2=active");
    } else {
      echo "Record does not delete try again";
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
    $sql = "SELECT * FROM tbl_home where status = 1 AND ava_start_date >= CURDATE() order by rand()";
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


  // Fetch tour records for show listing
  public function HomeSearchData($Hdistrict, $Hsdate, $Hedate, $Hcadult, $Hckid, $Hcroom, $Hpricerange, $Htype)
  {
    $sql = "SELECT * from tbl_home WHERE status = 1 AND ava_start_date >= CURDATE()
    AND district = '$Hdistrict' 
    AND ava_start_date >= '$Hsdate' 
    AND ava_end_date >= '$Hedate' 
    AND max_adults >= '$Hcadult' 
    AND max_kids >= '$Hckid' 
    AND rooms >= '$Hcroom' 
    AND ava_night_price <= '$Hpricerange'  
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


  public function HomePriceCalculation($adultcount, $kidcount, $nightcount, $kidprice, $adultprice)
  {
    $total_person_count = $adultcount + $kidcount;

    $sum_adults_price = $adultcount * $adultprice;
    $total_nights_adults_price = $nightcount * $sum_adults_price;

    $sum_kids_price = $kidcount * $kidprice;
    $total__nights_kids_price = $nightcount * $sum_kids_price;


    $total_amount = $total_nights_adults_price + $total__nights_kids_price;

    return array(
      'total_person_count'    => $total_person_count,
      'total_adults_price' => $total_nights_adults_price,
      'total_kids_price' => $total__nights_kids_price,
      'total_amount' => $total_amount,
    );
  }
}
