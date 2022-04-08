<?php

// Begin/resume session
session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "tams_db";


try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 echo $e->getMessage();
}

//including authorization class
include_once 'classes/class.auth.php';
$auth = new auth($DB_con);

//including customer class
include_once 'classes/class.customer.php';
$customer = new customer($DB_con);

//including partner class
include_once 'classes/class.partner.php';
$partner = new partner($DB_con);

//including admin class
include_once 'classes/class.admin.php';
$admin = new admin($DB_con);

//including inquiry class
include_once 'classes/class.inquiry.php';
$inquiry = new inquiry($DB_con);

//including home class
include_once 'classes/class.home.php';
$home = new home($DB_con);

//including booking class
include_once 'classes/class.booking.php';
$booking = new booking($DB_con);

//including earning class 
include_once 'classes/class.earning.php';
$earning = new earning($DB_con);

//including tour class 
include_once 'classes/class.tour.php';
$tour = new tour($DB_con);

//including review class 
include_once 'classes/class.review.php';
$review = new review($DB_con);

?>




