<?php

class reports
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    // Partner Earning Report

    public function EarningReport($Rtype, $SDate, $EDate, $pid)
    {
        $sql = '';
        $sql = "SELECT DISTINCT 
         tbl_earning.earning_id,tbl_earning.total_amount,tbl_earning.profit_percentage,tbl_earning.net_amount,tbl_earning.payout,tbl_earning.created_date,tbl_earning.service_type,tbl_earning.service_name,
         tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.payment_status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cus_payment_card_type,
         tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
         from tbl_earning
         join tbl_customer on tbl_earning.customer_id=tbl_customer.customer_id
         join tbl_booking on tbl_earning.booking_id=tbl_booking.booking_id
         where ";

        $TTypeString = 'Tour_Package';
        $HTypeString = 'Home_Stay';
        $Amount = 15000;
        $Percentage = 15;

        if ($Rtype == 1) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' ORDER BY created_date DESC ";
        } elseif ($Rtype == 2) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.service_type= '$TTypeString' ORDER BY created_date DESC ";
        } elseif ($Rtype == 3) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.service_type= '$HTypeString' ORDER BY created_date DESC ";
        } elseif ($Rtype == 4) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.total_amount>= '$Amount' ORDER BY created_date DESC ";
        } elseif ($Rtype == 5) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.total_amount<= '$Amount' ORDER BY created_date DESC ";
        } elseif ($Rtype == 6) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.profit_percentage<= '$Percentage' ORDER BY created_date DESC ";
        } elseif ($Rtype == 7) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid' AND tbl_earning.profit_percentage>= '$Percentage' ORDER BY created_date DESC ";
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
}
