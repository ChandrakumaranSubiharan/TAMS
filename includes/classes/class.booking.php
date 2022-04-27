<?php

class booking
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertBookingData($total_amount, $cus_card_type, $card_holdername, $card_number, $cus_id, $booking_sdate, $booking_edate, $total_night, $total_persons_count, $adult_count, $kid_count, $serviceid, $servicename, $stype, $pid, $cancell_ava)
  {
    // variable to fetch home active/inactive status by bool value
    $sta = "0";

    // variable to fetch home active/inactive status by bool value
    $paymentsta = "1";

    $query = "INSERT INTO tbl_booking(
      total_amount, 
      cus_payment_card_type, 
      payment_card_holder_name,
      payment_card_number,
      cus_id, 
      start_date, 
      end_date, 
      status, 
      payment_status, 
      total_nights, 
      total_persons, 
      total_kids,
      total_adults,
      service_id,
      service_name,
      service_type,
      partner_id,
      cancellation_ava)
           VALUES(
             '$total_amount',
             '$cus_card_type',
             '$card_holdername',
             '$card_number',
             '$cus_id',
             '$booking_sdate',
             '$booking_edate',
             '$sta',
             '$paymentsta',
             '$total_night',
             '$total_persons_count',
             '$kid_count',
             '$adult_count',
             '$serviceid',
             '$servicename',
             '$stype',
             '$pid',
             '$cancell_ava')";

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
    $query = "SELECT tbl_booking.booking_id,tbl_booking.service_type,tbl_booking.service_name,tbl_booking.total_amount,tbl_booking.payment_status,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_adults,tbl_booking.total_kids,tbl_booking.partner_id,tbl_booking.cancellation_ava,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_number,tbl_customer.email_address
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
    $query = "SELECT tbl_booking.booking_id,tbl_booking.service_type,tbl_booking.service_name,tbl_booking.total_amount,tbl_booking.payment_status,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_adults,tbl_booking.total_kids,tbl_booking.partner_id,tbl_booking.created_date,tbl_booking.status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cancellation_ava,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.contact_number,tbl_customer.email_address,tbl_earning.payout,tbl_earning.earning_id
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
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function displayBookingByPartner($pid, $viewId)
  {


    $sql = '';
    $sql = "SELECT DISTINCT tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.total_amount,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.status,tbl_booking.created_date,tbl_booking.payment_status,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_kids,tbl_booking.total_adults,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.service_id,tbl_booking.service_name,tbl_booking.service_type,tbl_booking.cancellation_ava, tbl_earning.earning_id,tbl_earning.net_amount,tbl_earning.payout,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
        from tbl_booking
        join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id
        join tbl_earning on tbl_booking.booking_id=tbl_earning.booking_id
        where ";
    if ($viewId == 1) {
      $sql .= "tbl_booking.partner_id= $pid ";
    } elseif ($viewId == 2) {
      $sql .= "tbl_booking.partner_id= $pid AND payment_status >= 2 ";
    } elseif ($viewId == 3) {
      $sql .= "tbl_booking.partner_id= $pid order by tbl_booking.created_date desc limit 5";
    };

    $sql .= ";";

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

  public function displayBookingByCustomer($cid)
  {
    $sql = "SELECT  *  FROM tbl_booking where cus_id = $cid order by created_date desc limit 5";
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

  public function displayBookingForAdmin()
  {
    $sql = "SELECT DISTINCT tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.total_amount,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.status,tbl_booking.created_date,tbl_booking.payment_status,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_kids,tbl_booking.total_adults,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.service_id,tbl_booking.service_name,tbl_booking.service_type,tbl_booking.cancellation_ava, tbl_earning.earning_id,tbl_earning.net_amount,tbl_earning.payout,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
    from tbl_booking
    join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id
    join tbl_earning on tbl_booking.booking_id=tbl_earning.booking_id
    order by created_date desc limit 5";
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


  public function updatestatusConfirm($id)
  {
    try {
      $sta = 2;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET 
                status=:st
             WHERE booking_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function updatestatusCancel($id)
  {
    try {
      $sta = 1;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET 
                status=:st
             WHERE booking_id=:id ");
      $stmt->bindparam(":st", $sta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  //  Customer Dashboard Querys Start

  public function GetUnconfirmedBookingCount($uid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE cus_id = $uid AND status = 0";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function GetConfirmedBookingCount($uid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE cus_id = $uid AND status = 2";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function GetCancelledBookingCount($uid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE cus_id = $uid AND status = 1";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function GetRefundedBookingCount($uid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE cus_id = $uid AND payment_status >= 2";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  //  Customer Dashboard Querys End


  public function UpdateCancellation($id)
  {
    try {
      $CancellationSta = 0;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET 
                cancellation_ava=:Cst
             WHERE booking_id=:id ");
      $stmt->bindparam(":Cst", $CancellationSta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function UpdateCancellationWithRefund($id)
  {
    try {
      $CancellationSta = 0;
      $PaymentSta = 3;
      $BookingSta = 3;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET 
                cancellation_ava=:Cst,
                status=:Bst,
                payment_status=:Pst
             WHERE booking_id=:id ");
      $stmt->bindparam(":Cst", $CancellationSta);
      $stmt->bindparam(":Bst", $PaymentSta);
      $stmt->bindparam(":Pst", $BookingSta);
      $stmt->bindparam(":id", $id);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  //  Partner Dashboard Querys Start

  public function PartnerGetRefundedBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND payment_status >= 2";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }


  public function PartnerGetCompletedBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND status = 4";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }


  public function PartnerGetConfirmedBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND status = 2";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function PartnerGetUnConfirmedBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND status = 0";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function PartnerTotTourBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND service_type = 'Tour Package'";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  public function PartnerTotHomeBookingCount($pid)
  {
    $sql = "SELECT booking_id from tbl_booking WHERE partner_id = $pid AND service_type = 'Home Stay'";
    $query = $this->db->query($sql);
    $cnt = $query->rowCount();
    return $cnt;
  }

  //  Partner Dashboard Querys End



  // Auto Updates

  public function UpdateBookingStatusProgressByDate()
  {

    try {

      $PaymentSta = 1;
      $ProgressSta = 5;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET status=:St WHERE payment_status=:PSta AND DATE(NOW()) >= DATE(start_date) AND DATE(NOW()) <= DATE(end_date)");
      $stmt->bindparam(":St", $ProgressSta);
      $stmt->bindparam(":PSta", $PaymentSta);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function UpdateBookingStatusCompletedByDate()
  {

    try {

      $PaymentSta = 1;
      $CompletedSta = 4;
      $stmt = $this->db->prepare("UPDATE tbl_booking SET status=:St WHERE payment_status=:PSta AND DATE(NOW()) > DATE(end_date)");
      $stmt->bindparam(":St", $CompletedSta);
      $stmt->bindparam(":PSta", $PaymentSta);
      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }



  function BookingCountByMonth()
  {

    $sql = "SELECT MONTH(created_date), COUNT(MONTH(created_date)) FROM tbl_customer GROUP BY MONTH(created_date)";
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


  public function GetTopPartners()
  {
    $sql = "SELECT DISTINCT tbl_booking.partner_id, tbl_partner.username, tbl_earning.net_amount,
    COUNT(DISTINCT tbl_booking.booking_id), 
        SUM(tbl_earning.net_amount) 
    FROM tbl_booking 
    JOIN tbl_partner ON tbl_booking.partner_id = tbl_partner.partner_id
    JOIN tbl_earning ON tbl_booking.booking_id = tbl_earning.booking_id
    GROUP BY tbl_booking.partner_id, tbl_partner.username 
    ORDER BY 5 DESC";

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

  public function GetTopCustomer()
  {
    $sql = "SELECT tbl_booking.cus_id, tbl_customer.first_name, tbl_customer.last_name, 
    COUNT(DISTINCT tbl_booking.booking_id), 
MAX(tbl_booking.total_amount), 
SUM(tbl_booking.total_amount)
FROM tbl_booking 
JOIN tbl_customer ON tbl_booking.cus_id = tbl_customer.customer_id
GROUP BY tbl_booking.cus_id
ORDER BY 5 DESC;";

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
