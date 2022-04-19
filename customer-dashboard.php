<?php
// Include necessary file
include_once 'includes/dbconfig.php';


// Check if user is not logged in
if (!$auth->is_logged_in()) {
    $auth->redirect('login.php');
}


if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $auth->log_out();
    $auth->redirect('login.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h3 class="entry-title">My Account</h3>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>

    <section id="content" class="gray-area">
        <div class="container">
            <div id="main">
                <div class="tab-container full-width-style arrow-left dashboard">
                    <ul class="tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Dashboard</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profile</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Booking</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="dashboard" class="tab-pane fade in active">
                            <h1 class="no-margin skin-color">
                                Hi <?= $returned_row['username']; ?>, Welcome to HappyHolidayss!
                            </h1>
                            <p>
                                All your travel services booked with us will appear here and you’ll be
                                able to manage everything!
                            </p>
                            <br />
                            <div class="row block">
                                <div class="col-sm-6 col-md-3">
                                    <a href="hotel-list-view.html">
                                        <div class="fact yellow">
                                            <div class="numbers counters-box">
                                                <?php
                                                $uid =  $returned_row['customer_id'];
                                                $UnconfirmedBookingCount = $booking->GetUnconfirmedBookingCount($uid);
                                                ?>
                                                <dl>
                                                    <dt class="display-counter" data-value="<?php echo $UnconfirmedBookingCount; ?>">
                                                        <?php echo $UnconfirmedBookingCount; ?>
                                                    </dt>
                                                    <dd>Unconfirmed BKG</dd>
                                                </dl>
                                                <i class="icon soap-icon-bad"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <a href="flight-list-view.html">
                                        <div class="fact green">
                                            <div class="numbers counters-box">
                                                <?php
                                                $uid =  $returned_row['customer_id'];
                                                $ConfirmedBookingCount = $booking->GetConfirmedBookingCount($uid);
                                                ?>
                                                <dl>
                                                    <dt class="display-counter" data-value="<?php echo $ConfirmedBookingCount; ?>">
                                                        <?php echo $ConfirmedBookingCount; ?>
                                                    </dt>
                                                    <dd>Confirmed BKG</dd>
                                                </dl>
                                                <i class="icon soap-icon-recommend"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <a href="car-list-view.html">
                                        <div class="fact red">
                                            <div class="numbers counters-box">
                                                <?php
                                                $uid =  $returned_row['customer_id'];
                                                $CancelledBookingCount = $booking->GetCancelledBookingCount($uid);
                                                ?>
                                                <dl>
                                                    <dt class="display-counter" data-value="<?php echo $CancelledBookingCount; ?>">
                                                        <?php echo $CancelledBookingCount; ?>
                                                    </dt>
                                                    <dd>Host Cancelled BKG</dd>
                                                </dl>
                                                <i class="icon soap-icon-restricted"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <a href="cruise-list-view.html">
                                        <div class="fact blue">
                                            <div class="numbers counters-box">
                                                <?php
                                                $uid =  $returned_row['customer_id'];
                                                $RefundedBookingCount = $booking->GetRefundedBookingCount($uid);
                                                ?>
                                                <dl>
                                                    <dt class="display-counter" data-value="<?php echo $RefundedBookingCount; ?>">
                                                        <?php echo $RefundedBookingCount; ?>
                                                    </dt>
                                                    <dd>Refunded Bookings</dd>
                                                </dl>
                                                <i class="icon soap-icon-stories"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="row block">
                                <div class="col-md-12">
                                    <h2>Your Recent Bookings</h2>
                                </div>

                                <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Total Amount</th>
                                            <th>Start Date </th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Service Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php
                                        $cid = $returned_row['customer_id'];
                                        $bookingdata = $booking->displayBookingByCustomer($cid);
                                        foreach ($bookingdata as $bookings) {
                                        ?>
                                            <tr>
                                                <td><?php echo $bookings['booking_id']; ?></td>
                                                <td>LKR <?php echo $bookings['total_amount']; ?></td>
                                                <td><?php echo date('jS F, Y ', strtotime($bookings['start_date'])); ?></td>
                                                <td><?php echo date('jS F, Y ', strtotime($bookings['end_date'])); ?></td>
                                                <td><?php if ($bookings['status'] == 0) {
                                                        echo "<span style='color: teal;'>Not Confirmed</span>";
                                                    } elseif ($bookings['status'] == 1) {
                                                        echo "<span style='color: firebrick;'>Cancelled</span>";
                                                    } elseif ($bookings['status'] == 2) {
                                                        echo "<span style='color: green;'>Confirmed</span>";
                                                    } elseif ($bookings['status'] == 3) {
                                                        echo "<span style='color: red;'>Cancelled by Customer</span>";
                                                    } else {
                                                        echo "Booking Failed";
                                                    } ?></td>
                                                <td><?php if ($bookings['payment_status'] == 1) {
                                                        echo "<span style='color: green;'>Paid</span>";
                                                    } elseif ($bookings['payment_status'] >= 2) {
                                                        echo "<span style='color: blue;'>Refunded</span>";
                                                    } else {
                                                        echo "<span style='color: red;'>Not Paid</span>";
                                                    }
                                                    ?></td>
                                                <td><?php echo $bookings['service_name']; ?></td>
                                                <td><?php echo $bookings['service_type']; ?></td>
                                                <td> <a href="customer-booking-view-model.php?viewId=<?php echo $bookings['booking_id'] ?>">View</a></td>
                                            </tr>
                                        <?php
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="profile" class="tab-pane fade">

                            <?php
                            if (isset($_POST['submit'])) {
                                $uname = $_POST['uname'];
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $address = $_POST['address'];
                                $email = $_POST['email'];
                                $contact = $_POST['pnumber'];
                                $pass = $_POST['pass'];

                                $UpdateCustomerInfo = $customer->UpdateInfo($uname, $fname, $lname, $address, $email, $contact, $pass, $uid);

                                if ($UpdateCustomerInfo) {
                                    $msg = "New Details Successfully Updated ";
                                    echo "<script type='text/javascript'>
                                    alert('$msg');
                                    window.location.href='customer-dashboard.php';
                                    </script>";
                                } else {
                                    $msg = "Failed to Update New Details ";
                                    echo "<script type='text/javascript'>alert('$msg');</script>";
                                }
                            }
                            ?>

                            <form class="edit-profile-form" method="POST">
                                <h2>Personal Details</h2>
                                <div class="col-sm-12 no-padding no-float">
                                    <div class="row form-group">
                                        <div class="col-sms-6 col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" name="fname" value="<?= $returned_row['first_name']; ?>" class="input-text full-width" />
                                        </div>
                                        <div class="col-sms-6 col-sm-6">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="<?= $returned_row['last_name']; ?>" class="input-text full-width" />
                                        </div>
                                    </div>
                                    <hr />
                                    <h2>Contact Details</h2>
                                    <div class="row form-group">
                                        <div class="col-sms-6 col-sm-6">
                                            <label>Address</label>
                                            <input type="text" name="address" value="<?= $returned_row['address']; ?>" class="input-text full-width" />
                                        </div>
                                        <div class="col-sms-6 col-sm-6">
                                            <label>Phone Number</label>
                                            <input type="text" name="pnumber" value="<?= $returned_row['contact_number']; ?>" class="input-text full-width" />
                                        </div>
                                    </div>
                                    <hr />
                                    <h2>Account Authentication Settings</h2>
                                    <div class="row form-group">
                                        <div class="col-sms-4 col-sm-4">
                                            <label>User Name</label>
                                            <input type="text" name="uname" value="<?= $returned_row['username']; ?>" class="input-text full-width" />
                                        </div>
                                        <div class="col-sms-4 col-sm-4">
                                            <label>Email</label>
                                            <input name="email" type="email" value="<?= $returned_row['email_address']; ?>" class="input-text full-width" />
                                        </div>
                                        <div class="col-sms-4 col-sm-4">
                                            <label>Password</label>
                                            <input name="pass" type="password" value="" class="input-text full-width" />
                                            <span>Leave this blank if you dont want to change the password.</span>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="from-group">
                                        <button type="submit" name="submit" class="btn-medium col-sms-6 col-sm-4">
                                            UPDATE DETAILS
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="booking" class="tab-pane fade">
                            <h2>Travel Services You have Booked!</h2>
                            <?php
                            $cid = $returned_row['customer_id'];
                            $bookingdata = $booking->displayBookingByCustomer($cid);
                            foreach ($bookingdata as $bookings) {
                            ?>
                                <div class="booking-history">
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <?php
                                            $month = date('F', strtotime($bookings['created_date']));
                                            $dayname = date('l', strtotime($bookings['created_date']));
                                            $day = date('d', strtotime($bookings['created_date']));
                                            ?>
                                            <label class="month"><?php echo $month?></label>
                                            <label class="date"><?php echo $day?></label>
                                            <label class="day"><?php echo $dayname?></label>
                                        </div>
                                        <h4 class="box-title">
                                            <?php
                                            if ($bookings['service_type'] == "Tour Package") {
                                            ?>
                                                <i class="icon soap-icon-beach yellow-color circle"></i><?php echo $bookings['service_name']; ?><small><?php echo $bookings['service_type']; ?></small>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="icon soap-icon-address yellow-color circle"></i><?php echo $bookings['service_name']; ?><small><?php echo $bookings['service_type']; ?></small>
                                            <?php
                                            }
                                            ?>
                                        </h4>
                                        <dl class="info">
                                            <dt>Booking ID</dt>
                                            <dd><?php echo $bookings['booking_id']; ?></dd>
                                            <dt>TOTAL AMOUNT</dt>
                                            <dd><?php echo $bookings['total_amount']; ?> LKR</dd>

                                        </dl>
                                        <dl class="info">
                                            <dt>Start Date:</dt>
                                            <dd><?php echo $bookings['start_date']; ?></dd>
                                            <dt>End Date</dt>
                                            <dd><?php echo $bookings['end_date']; ?></dd>

                                        </dl>
                                        <button class="status blue">VIEW DETAILS</button>
                                        <?php
                                        if ($bookings['status'] == 0) {
                                        ?>
                                            <button class="status yellow">UNCONFIRMED</button>
                                        <?php
                                        } elseif ($bookings['status'] == 1) {
                                        ?>
                                            <button class="status red">HOST CANCELLED</button>
                                        <?php
                                        } elseif ($bookings['status'] == 2) {
                                        ?>
                                            <button class="status green">CONFIRMED</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="status red">CANCELLED BY YOU</button>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                            <?php

                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/jsscripts.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>