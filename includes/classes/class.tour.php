<?php 

class tour {

    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }


    // Insert tour data into tour table
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


}
