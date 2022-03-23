<?php

class home
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert customer data into customer table
  public function insertData($home_name, $location_address, $ava_night_price, $lg_desc, $home_type,$home_room, $extra_people, $district, $province, $cancel, $str_date, $end_date, $file,$pid)
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


  // Fetch customer records for show listing

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


  // Fetch single data for edit from customer table
  public function displyaRecordById($editId)
  {
    $query = "SELECT * FROM tbl_home WHERE home_id = '$editId'";
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


  // Delete customer data from home table
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
}
