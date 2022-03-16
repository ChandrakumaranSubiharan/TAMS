<?php

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

//including partner class
include_once 'classes/class.admin.php';
$admin = new admin($DB_con);

//including inquiry class
include_once 'classes/class.inquiry.php';
$inquiry = new inquiry($DB_con);
?>