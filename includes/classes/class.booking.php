<?php

class booking
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertBookingData($total_amount, $cus_fname, $cus_lname, $cus_email, $cus_contact, $cus_card_type, $card_holdername, $card_number, $cus_id, $booking_sdate, $booking_edate, $total_night, $total_persons_count, $adult_count, $kid_count, $serviceid, $servicename, $stype, $pid)
  {
    // variable to fetch home active/inactive status by bool value
    $sta = "0";

    // variable to fetch home active/inactive status by bool value
    $paymentsta = "1";

    // variable to fetch current date time
    $cdate = Date("y-m-d H:i:s");

    // variable to fetch null value
    $emty = NULL;

    $query = "INSERT INTO tbl_booking(
      total_amount, 
      cus_first_name, 
      cus_last_name, 
      cus_email, 
      cus_contact, 
      cus_payment_card_type, 
      payment_card_holder_name,
      payment_card_number,
      cus_id, 
      start_date, 
      end_date, 
      status, 
      created_date, 
      payment_status, 
      total_nights, 
      total_persons, 
      total_kids,
      total_adults,
      service_id,
      service_name,
      service_type,
      partner_id)
           VALUES(
             '$total_amount',
             '$cus_fname',
             '$cus_lname',
             '$cus_email',
             '$cus_contact',
             '$cus_card_type',
             '$card_holdername',
             '$card_number',
             '$cus_id',
             '$booking_sdate',
             '$booking_edate',
             '$sta',
             '$cdate',
             '$paymentsta',
             '$total_night',
             '$total_persons_count',
             '$kid_count',
             '$adult_count',
             '$serviceid',
             '$servicename',
             '$stype',
             '$pid')";

    $sql = $this->db->exec($query);
    if ($sql == true) {
      $last_id = $this->db->lastInsertId();
      return array(
        'lastInsertedID'    => $last_id,
      );
    } else {
      return false;
    }
  }


  public function GetRecentlyBookedTour()
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


    // Fetch single data for edit from home table
    public function displyaRecordByIdviaArray($Id)
    {
      $query = "SELECT * FROM tbl_booking WHERE booking_id = '$Id'";
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
}
