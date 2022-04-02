<?php 

class tour {

    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }


    // Insert tour data into tour table
  public function insertData($tour_title,$tour_location,$adult_price,$file,$tour_details,$tour_duration,$tour_type,$ava_seats,$tour_language,$district,$cancel,$str_date,$end_date,$pid)
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


          $query = "INSERT INTO tbl_tour(
              title,
              details,
              location,
              tour_type,
              duration_days,
              adult_price,
              image,
              created_date,
              partner_id,
              status,
              language,
              district,
              availabile_seats,
              ava_start_date,
              ava_end_date,
              cancellation,
              )
                 VALUES(
                     '$tour_title',
                     '$tour_details',
                     '$tour_location',
                     '$tour_type',
                     '$tour_duration',
                     '$adult_price',
                     '$file',
                     '$cdate',
                     '$pid',
                     '$sta',
                     '$tour_language',
                     '$district',
                     '$ava_seats',
                     '$str_date',
                     '$end_date',
                     '$cancel')";
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
