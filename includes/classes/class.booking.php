<?php

class booking
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertBookingData($total_amount, $cus_card_type, $card_holdername, $card_number, $cus_id, $booking_sdate, $booking_edate, $total_night, $total_persons_count, $adult_count, $kid_count, $serviceid, $servicename, $stype, $pid)
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
      $query = "SELECT tbl_booking.booking_id,tbl_booking.service_type,tbl_booking.service_name,tbl_booking.total_amount,tbl_booking.payment_status,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_adults,tbl_booking.total_kids,tbl_booking.partner_id,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_number,tbl_customer.email_address
      from tbl_booking
      join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id 
      where tbl_booking.booking_id = $Id";

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


  public function displyaRecordById($Id)
  {
    $query = "SELECT tbl_booking.booking_id,tbl_booking.service_type,tbl_booking.service_name,tbl_booking.total_amount,tbl_booking.payment_status,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_adults,tbl_booking.total_kids,tbl_booking.partner_id,tbl_booking.created_date,tbl_booking.status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_number,tbl_customer.email_address,tbl_earning.payout
      from tbl_booking
      join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id 
      join tbl_earning on tbl_booking.cus_id=tbl_earning.customer_id 
      where tbl_booking.booking_id = $Id";
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


    public function GetBookingsCount()
    {
      $sql = "SELECT booking_id from tbl_booking";
      $query = $this->db->query($sql);
      $cnt=$query->rowCount();
      return $cnt;
    }

    public function displayBookingByPartner($pid)
   {

    $sql = "SELECT DISTINCT tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.total_amount,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.status,tbl_booking.created_date,tbl_booking.payment_status,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_kids,tbl_booking.total_adults,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.service_id,tbl_booking.service_name,tbl_booking.service_type, tbl_earning.earning_id,tbl_earning.net_amount,tbl_earning.payout,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
    from tbl_booking
    join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id
    join tbl_earning on tbl_booking.cus_id=tbl_earning.customer_id
    where tbl_booking.partner_id= $pid" ;

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
}
