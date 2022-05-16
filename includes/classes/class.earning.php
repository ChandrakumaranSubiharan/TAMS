<?php

class earning
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertEarningData($bid, $tot, $payout, $net, $cid, $stitle, $sid, $type, $Profit_Percentage)
  {
    $query = "INSERT INTO tbl_earning(booking_id, total_amount, payout, net_amount, customer_id,service_name,service_id,service_type,profit_percentage)
                 VALUES('$bid','$tot','$payout','$net','$cid','$stitle','$sid','$type','$Profit_Percentage')";
    $sql = $this->db->query($query);
    if ($sql == true) {
      return true;
    } else {
      return false;
    }
  }


  // Calculating Home Service Net Amount
  function HomePercentageCalculate($total_amount)
  {
    // if home booking amount graterthan 50000
    // the allocated percentage will be 20% or it will be 10%
    if ($total_amount >= 50000) {
      $Allocated_percentage = 20;
    } else {
      $Allocated_percentage = 10;
    }
    //Convert our percentage value into a decimal.
    $percentInDecimal = $Allocated_percentage / 100;
    //Get the result.
    $Net_Amount = $percentInDecimal * $total_amount;
    return $Net_Amount;
  }

  // Calculating Tour Service Net Amount
  function TourPercentageCalculate($total_amount)
  {
    // if tour booking amount graterthan 20000
    // the allocated percentage will be 20% or it will be 10%
    if ($total_amount >= 20000) {
      $Allocated_percentage = 20;
    } else {
      $Allocated_percentage = 10;
    }

    //Convert our percentage value into a decimal.
    $percentInDecimal = $Allocated_percentage / 100;

    //Get the result.
    $Net_Amount = $percentInDecimal * $total_amount;

    return array(
      'percentage'    => $Allocated_percentage,
      'net_amount' => $Net_Amount,
    );
  }

  function Payout($tot_amount, $net_amount)
  {
    $payout = $tot_amount - $net_amount;
    return $payout;
  }

  public function displayEarningByPartner($pid)
  {

    $sql = "SELECT DISTINCT 
      tbl_earning.earning_id,tbl_earning.total_amount,tbl_earning.profit_percentage,tbl_earning.net_amount,tbl_earning.payout,tbl_earning.created_date,tbl_earning.service_type,tbl_earning.service_name,
      tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.payment_status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cus_payment_card_type,
      tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number

      from tbl_earning
      join tbl_customer on tbl_earning.customer_id=tbl_customer.customer_id
      join tbl_booking on tbl_earning.booking_id=tbl_booking.booking_id
      where tbl_booking.payment_status = 1 AND tbl_booking.partner_id= $pid ";


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

  public function displyaRecordById($Id)
  {
    $query = "SELECT DISTINCT 
    tbl_earning.earning_id,tbl_earning.total_amount,tbl_earning.profit_percentage,tbl_earning.net_amount,tbl_earning.payout,tbl_earning.created_date,tbl_earning.service_type,tbl_earning.service_name,
    tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.payment_status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cus_payment_card_type,
    tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number

    from tbl_earning
    join tbl_customer on tbl_earning.customer_id=tbl_customer.customer_id
    join tbl_booking on tbl_earning.booking_id=tbl_booking.booking_id
    where tbl_earning.earning_id= $Id";

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


  public function displyaAllRecord()
  {
    $sql = "SELECT DISTINCT 
      tbl_earning.earning_id,tbl_earning.total_amount,tbl_earning.profit_percentage,tbl_earning.net_amount,tbl_earning.payout,tbl_earning.created_date,tbl_earning.service_type,tbl_earning.service_name,
      tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.payment_status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cus_payment_card_type,
      tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number

      from tbl_earning
      join tbl_customer on tbl_earning.customer_id=tbl_customer.customer_id
      join tbl_booking on tbl_earning.booking_id=tbl_booking.booking_id";


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

  // total earning amount calculate for partner
  public function TotEarAmount($pid)
  {
    $sql = "SELECT DISTINCT tbl_booking.partner_id,
    SUM(tbl_earning.payout) 
    FROM tbl_booking 
    JOIN tbl_partner ON tbl_booking.partner_id = tbl_partner.partner_id
    JOIN tbl_earning ON tbl_booking.booking_id = tbl_earning.booking_id
    where tbl_partner.partner_id= $pid";

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


  // total payout amount calculate for partner
  public function TotPayoutAmount($pid)
  {
    $sql = "SELECT DISTINCT tbl_booking.partner_id,
    SUM(tbl_earning.net_amount) 
    FROM tbl_booking 
    JOIN tbl_partner ON tbl_booking.partner_id = tbl_partner.partner_id
    JOIN tbl_earning ON tbl_booking.booking_id = tbl_earning.booking_id
    where tbl_partner.partner_id= $pid";

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


    // total earning amount calculate for admin
    public function TotEarAmountAdmin()
    {
      $sql = "SELECT SUM(tbl_earning.net_amount) FROM tbl_earning ;";
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
