<?php

class earning
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertEarningData($pid,$tot,$payout,$net,$customerid)
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
            cus_id, 
            start_date, 
            end_date, 
            status, 
            created_date, 
            payment_status, 
            total_nights, 
            total_persons, 
            home_id,
            home_name, 
            partner_id)
                 VALUES(
                   '$tot_amount',
                   '$cus_fname',
                   '$cus_lname',
                   '$cus_email',
                   '$cus_contact',
                   '$cus_card_type',
                   '$cus_id',
                   '$b_sdate',
                   '$b_edate',
                   '$sta',
                   '$cdate',
                   '$paymentsta',
                   '$b_tot_night',
                   '$b_tot_persons',
                   '$b_h_id',
                   '$b_h_name',
                   '$pid')";
    $sql = $this->db->query($query);
    if ($sql == true) {
      return true;
    } else {
      return false;
    }
  }
}



