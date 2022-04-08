<?php
include_once 'includes/dbconfig.php';

if (isset($_POST['btn-inquiry'])) {
    // Retrieve form input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check for empty and invalid inputs
    if (empty($name)) {
        echo '<script>alert("Please enter a valid Name")</script>';
    } elseif (empty($email)) {
        echo '<script>alert("Please enter a valid Email")</script>';
    } elseif (empty($contact)) {
        echo '<script>alert("Please enter a valid Contact Number")</script>';
    } elseif (empty($subject)) {
        echo '<script>alert("Please enter a valid Subject")</script>';
    } elseif (empty($message)) {
        echo '<script>alert("Please enter a valid Message")</script>';
    } else {
        // Check if the user may send the inquriry

        if ($inquiry->create_enquiry($name, $email, $contact, $subject, $message)) {
            header("Location: contact-us.php?success");
        } else {
            header("Location: contact-us.php?failed");
        }
    }
}

?>


<?php
if (isset($_GET['success'])) {
    $msg = "successfully inquiry has been send.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
} else if (isset($_GET['failed'])) {
    $msg = "Oops !, inquiry failed to send.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <section id="content">
        <div class="container">
            <div id="main">
                <div class="contact-address row block">
                    <div class="col-md-4">
                        <div class="icon-box style5">
                            <i class="soap-icon-phone"></i>
                            <div class="description">
                                <small>We are on 24/7</small>
                                <h5>Local: +(094) 125-4985-214</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box style5">
                            <i class="soap-icon-message"></i>
                            <div class="description">
                                <small>Send us email on</small>
                                <h5>info@happyholidayss.com</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box style5">
                            <i class="soap-icon-address"></i>
                            <div class="description">
                                <small>meet us at</small>
                                <h5>292 Sea St, Colombo 01100, Sri Lanka</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="travelo-box box-full">
                    <div class="contact-form">
                        <h2>Send us a Message</h2>
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="name" class="input-text full-width">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email" name="email" class="input-text full-width">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Contact Number</label>
                                        <input type="text" name="contact" class="input-text full-width">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="subject" class="input-text full-width">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea name="message" rows="8" class="input-text full-width" placeholder="write message here"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sms-offset-6 col-sm-offset-6 col-md-offset-8 col-lg-offset-9">
                                <button name="btn-inquiry" class="btn-medium full-width">SEND MESSAGE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/jsscripts.php'); ?>
    <?php include('includes/footer.php'); ?>
</body>

</html>