<?php

class reports
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    // Partner 
    // Earning Report

    public function EarningReport($Rtype, $SDate, $EDate, $pid, $Type)
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

        $TTypeString = 'Tour Package';
        $HTypeString = 'Home Stay';
        $Amount = 15000;
        $Percentage = 15;

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount>= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount<= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage<= '$Percentage' $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage>= '$Percentage' $SqlOrderByQuery ";
            };
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_earning.created_date) = '$SDate' AND tbl_booking.partner_id= '$pid'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount>= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount<= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage<= '$Percentage' $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage>= '$Percentage' $SqlOrderByQuery ";
            };
        }

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


    // Booking Report

    public function BookingReport($Rtype, $SDate, $EDate, $pid, $Type)
    {
        $sql = '';
        $sql = "SELECT DISTINCT tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.total_amount,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.status,tbl_booking.created_date,tbl_booking.payment_status,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_kids,tbl_booking.total_adults,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.service_id,tbl_booking.service_name,tbl_booking.service_type,tbl_booking.cancellation_ava, tbl_earning.earning_id,tbl_earning.net_amount,tbl_earning.payout,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
         from tbl_booking
         join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id
         join tbl_earning on tbl_booking.booking_id=tbl_earning.booking_id
         where ";

        $TTypeString = 'Tour Package';
        $HTypeString = 'Home Stay';

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_booking.created_date) BETWEEN '$SDate' AND '$EDate' AND tbl_booking.partner_id= '$pid'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 0 $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 2 $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 5 $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 1 or tbl_booking.status= 3 $SqlOrderByQuery ";
            } elseif ($Rtype == 8) {
                $sql .= "$SqlCommonQuery AND tbl_booking.payment_status>=2 $SqlOrderByQuery ";
            } elseif ($Rtype == 9) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 4 $SqlOrderByQuery ";
            };
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_booking.created_date) = '$SDate' AND tbl_booking.partner_id= '$pid'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 0 $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 2 $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 5 $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 1 or tbl_booking.status= 3 $SqlOrderByQuery ";
            } elseif ($Rtype == 8) {
                $sql .= "$SqlCommonQuery AND tbl_booking.payment_status>=2 $SqlOrderByQuery ";
            } elseif ($Rtype == 9) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 4 $SqlOrderByQuery ";
            };
        }

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








    // admin reports

    //partner report
    public function PartnersReport($Rtype, $SDate, $EDate, $Type)
    {
        $sql = '';
        $sql = "SELECT DISTINCT tbl_booking.partner_id, tbl_partner.username, tbl_earning.payout,tbl_earning.net_amount,
        tbl_partner.partner_id,
        tbl_partner.first_name,
        tbl_partner.last_name,
        tbl_partner.username,
        tbl_partner.address,
        tbl_partner.email_address,
        tbl_partner.contact_number,
        tbl_partner.status,
        tbl_partner.gender,
        tbl_partner.zipcode,
        tbl_partner.created_date,
        tbl_partner.updated_date,
        tbl_partner.province,
        COUNT(DISTINCT tbl_booking.booking_id), 
        COUNT(DISTINCT tbl_home.partner_id), 
        COUNT(DISTINCT tbl_tour.partner_id), 
            SUM(tbl_earning.payout), 
            SUM(tbl_earning.net_amount) 
        FROM tbl_booking 
        JOIN tbl_partner ON tbl_booking.partner_id = tbl_partner.partner_id
        JOIN tbl_earning ON tbl_booking.booking_id = tbl_earning.booking_id
        JOIN tbl_home ON tbl_partner.partner_id = tbl_home.partner_id
        JOIN tbl_tour ON tbl_partner.partner_id = tbl_tour.partner_id
        WHERE ";

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_partner.created_date) BETWEEN '$SDate' AND '$EDate'";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery ORDER BY COUNT(DISTINCT tbl_booking.booking_id) DESC ";
            }
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_partner.created_date) = '$SDate'";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery ORDER BY COUNT(DISTINCT tbl_booking.booking_id) DESC ";
            };
        }

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



    //customer report
    public function CustomersReport($Rtype, $SDate, $EDate, $Type)
    {
        $sql = '';
        $sql = "SELECT DISTINCT tbl_booking.cus_id, 
         tbl_customer.customer_id,
         tbl_customer.first_name,
         tbl_customer.last_name,
         tbl_customer.email_address,
         tbl_customer.address,
         tbl_customer.contact_number,
         tbl_customer.status,
         tbl_customer.created_date,
         COUNT(DISTINCT tbl_booking.booking_id) 
         FROM tbl_booking 
         JOIN tbl_customer ON tbl_booking.cus_id = tbl_customer.customer_id
         WHERE ";

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_customer.created_date) BETWEEN '$SDate' AND '$EDate'";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY tbl_customer.created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery ORDER BY COUNT(DISTINCT tbl_booking.booking_id) DESC ";
            }
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_customer.created_date) = '$SDate'";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY tbl_customer.created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery ORDER BY COUNT(DISTINCT tbl_booking.booking_id) DESC ";
            };
        }

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


    
    // Booking Report

    public function BookingReportAll($Rtype, $SDate, $EDate, $Type)
    {
        $sql = '';
        $sql = "SELECT DISTINCT tbl_booking.booking_id,tbl_booking.cus_id,tbl_booking.total_amount,tbl_booking.cus_payment_card_type,tbl_booking.start_date,tbl_booking.end_date,tbl_booking.status,tbl_booking.created_date,tbl_booking.payment_status,tbl_booking.total_nights,tbl_booking.total_persons,tbl_booking.total_kids,tbl_booking.total_adults,tbl_booking.payment_card_holder_name,tbl_booking.payment_card_number,tbl_booking.service_id,tbl_booking.service_name,tbl_booking.service_type,tbl_booking.cancellation_ava, tbl_earning.earning_id,tbl_earning.net_amount,tbl_earning.payout,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.email_address,tbl_customer.contact_number
         from tbl_booking
         join tbl_customer on tbl_booking.cus_id=tbl_customer.customer_id
         join tbl_earning on tbl_booking.booking_id=tbl_earning.booking_id
         where ";

        $TTypeString = 'Tour Package';
        $HTypeString = 'Home Stay';

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_booking.created_date) BETWEEN '$SDate' AND '$EDate'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 0 $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 2 $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 5 $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 1 or tbl_booking.status= 3 $SqlOrderByQuery ";
            } elseif ($Rtype == 8) {
                $sql .= "$SqlCommonQuery AND tbl_booking.payment_status>=2 $SqlOrderByQuery ";
            } elseif ($Rtype == 9) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 4 $SqlOrderByQuery ";
            };
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_booking.created_date) = '$SDate'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_booking.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 0 $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 2 $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 5 $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 1 or tbl_booking.status= 3 $SqlOrderByQuery ";
            } elseif ($Rtype == 8) {
                $sql .= "$SqlCommonQuery AND tbl_booking.payment_status>=2 $SqlOrderByQuery ";
            } elseif ($Rtype == 9) {
                $sql .= "$SqlCommonQuery AND tbl_booking.status= 4 $SqlOrderByQuery ";
            };
        }

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




    // Earning Report

    public function EarningReportAll($Rtype, $SDate, $EDate, $Type)
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

        $TTypeString = 'Tour Package';
        $HTypeString = 'Home Stay';
        $Amount = 15000;
        $Percentage = 15;

        if ($Type == 'DateWise') {

            $SqlCommonQuery = "DATE(tbl_earning.created_date) BETWEEN '$SDate' AND '$EDate'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount>= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount<= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage>= '$Percentage' $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage<= '$Percentage' $SqlOrderByQuery ";
            };
        } elseif ($Type == 'Daily') {

            $SqlCommonQuery = "DATE(tbl_earning.created_date) = '$SDate'";
            $SqlOrderByQuery = "ORDER BY created_date DESC";

            if ($Rtype == 1) {
                $sql .= "$SqlCommonQuery ORDER BY created_date DESC ";
            } elseif ($Rtype == 2) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$TTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 3) {
                $sql .= "$SqlCommonQuery AND tbl_earning.service_type= '$HTypeString' $SqlOrderByQuery ";
            } elseif ($Rtype == 4) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount>= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 5) {
                $sql .= "$SqlCommonQuery AND tbl_earning.total_amount<= '$Amount' $SqlOrderByQuery ";
            } elseif ($Rtype == 6) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage>= '$Percentage' $SqlOrderByQuery ";
            } elseif ($Rtype == 7) {
                $sql .= "$SqlCommonQuery AND tbl_earning.profit_percentage<= '$Percentage' $SqlOrderByQuery ";
            };
        }

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
