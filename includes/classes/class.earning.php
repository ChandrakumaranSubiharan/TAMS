<?php

class earning
{
  private $db;

  function __construct($DB_con)
  {
    $this->db = $DB_con;
  }

  // Insert booking data into booking table
  public function insertEarningData($pid,$tot,$payout,$net,$cid,$title,$sid,$type)
  {
    // variable to fetch current date time
    $cdate = Date("y-m-d H:i:s");

    // variable to fetch null value
    $emty = NULL;




    $query = "INSERT INTO tbl_earning(partner_id, total_amount, payout, net_amount, customer_id,created_date,service_name,service_id,service_type)
                 VALUES('$pid','$tot','$payout','$net','$cid','$cdate','$title','$sid','$type')";
    $sql = $this->db->query($query);
    if ($sql == true) {
      return true;
    } else {
      return false;
    }
  }



  function PercentageCalculate($total_amount){

    if($total_amount >= 50000){
      $Allocated_percentage = 20;
      }else{
      $Allocated_percentage = 10;
      }
      
    //Convert our percentage value into a decimal.
    $percentInDecimal = $Allocated_percentage / 100;

    //Get the result.
    $Net_Amount = $percentInDecimal * $total_amount;

      return $Net_Amount;

  }

  function TourPercentageCalculate($total_amount){

    if($total_amount >= 5000){
      $Allocated_percentage = 20;
      }else{
      $Allocated_percentage = 10;
      }
      
    //Convert our percentage value into a decimal.
    $percentInDecimal = $Allocated_percentage / 100;

    //Get the result.
    $Net_Amount = $percentInDecimal * $total_amount;

      return $Net_Amount;

  }
  


  function Payout ($tot_amount,$net_amount){

    $payout = $tot_amount - $net_amount;

    return $payout;
  }

}



