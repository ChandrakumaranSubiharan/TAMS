<?php

class home
{
 private $db;
 
 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }

     // Insert customer data into customer table
     public function insertData($home_name, $location_address, $ava_night_price, $lg_desc, $home_type, $extra_people, $district, $province, $cancel, $str_date, $end_date, $file)
     {	
         $allow = array('jpg', 'jpeg', 'png');
            $exntension = explode('.', $file['name']);
            $fileActExt = strtolower(end($exntension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = 'includes/uploads/'.$fileNew;
 
         if (in_array($fileActExt, $allow)) {
                   if ($file['size'] > 0 && $file['error'] == 0) {
                 if (move_uploaded_file($file['tmp_name'], $filePath)) {

                        // variable to fetch home active/inactive status by bool value
                        $sta = "0";

                        // variable to fetch current date time
                        $cdate =Date("y-m-d H:i:s");

                        // variable to fetch null value
                        $emty =NULL; 


                $query = "INSERT INTO tbl_home(home_name, location_address, ava_night_price, lg_desc, home_type, extra_people, district, province, cancellation, ava_start_date, ava_end_date,created_date,status, cover_img1)
                 VALUES('$home_name','$location_address','$ava_night_price','$lg_desc','$home_type','$extra_people','$district','$province','$cancel','$str_date','$end_date','$cdate','$sta','$fileNew')";
             $sql = $this->db->query($query);
             if ($sql==true) {
                return true;
             }else{
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
        }else{
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
              }else{
                echo "Record not found";
              }
        }

    public function editData(){

    }















 
}
