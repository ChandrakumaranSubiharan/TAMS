<?php

class reports
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function EarningReport($Rtype, $SDate, $EDate, $pid)
    {
        $HTypeString = 'Home_Stay';
        $TTypeString = 'Tour_Package';
        $sql = '';
        $sql = "SELECT DISTINCT 
         tbl_earning.earning_id,tbl_earning.total_amount,tbl_earning.profit_percentage,tbl_earning.net_amount,tbl_earning.payout,tbl_earning.created_date,tbl_earning.service_type,tbl_earning.service_name,
         tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.payment_status,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.cus_payment_card_type,
         tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
         from tbl_earning
         join tbl_customer on tbl_earning.customer_id=tbl_customer.customer_id
         join tbl_booking on tbl_earning.booking_id=tbl_booking.booking_id
         where ";
        if ($Rtype == 1) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= $pid ORDER BY created_date DESC ";
        } elseif ($Rtype == 2) {
            $sql .= "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= $pid AND tbl_earning.service_type= $TTypeString ORDER BY created_date DESC";
        } else {
            return false;
        };



        // elseif ($Rtype == 3) {
        //     $sql .= "tbl_booking.partner_id= $pid order by tbl_booking.created_date desc";
        // };



        // if ($Rtype == 1) {
        //     $sql .= "tbl_booking.payment_status = 1 AND 
        //     tbl_booking.status = 2 OR 
        //     tbl_booking.status >= 3 AND 
        //     DATE(tbl_earning.created_date) BETWEEN 
        //     $SDate AND 
        //     $EDate AND 
        //     tbl_booking.partner_id = $Pid";

        // } elseif ($Rtype == 2) {
        //     $sql .= "DATE(created_date) BETWEEN '$SDate' AND '$EDate' AND partner_id = '$Pid' AND service_type = 'Tour Package' ORDER BY created_date DESC LIMIT 5";
        // };
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

// where date(BookingDate) between '$fdate' and '$tdate'
