<?php
include_once '../includes/dbconfig.php';

// Check if user is already logged in
if ($auth->is_logged_in()) {
    // Redirect logged in user to their home page
    $auth->redirect('dashboard.php');
}


//Post the inputs
if (isset($_POST['btn-partner-login'])) {
    // Retrieve form input
    $email = $_POST['pmailuser'];
    $uname = $_POST['pmailuser'];
    $pass = $_POST['ppassword'];

    // Check for empty and invalid inputs
    if (empty($email)) {
        echo '<script>alert("Please enter a valid Email or Username")</script>';
    } elseif (empty($pass)) {
        echo '<script>alert("Please enter a valid Pass")</script>';
    } else {
        // Check if the user may be logged in
        if ($auth->partnerlogin($uname, $email, $pass)) {
            // Redirect if logged in successfully
            $auth->redirect('dashboard.php');
        } else {
            echo '<script>alert("Incorrect log-in credentials.")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMS | HappyHolidayss</title>
    <meta name="keywords" content="happyholidayss" />
    <meta name="description" content="HappyHolidayss | Accomodations & Tours">
    <meta name="author" content="Subiharan">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="../assets/css/components/header.css">
    <link id="main-style" rel="stylesheet" href="../assets/css/style.css">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>

    <section id="partner-login">

        <div class="user-login-form-container">

            <div id="travelo-login" class="travelo-box">
                <div class="sign">
                    <img src="../assets/images/icon.svg" alt="">
                    <h3>Login</h3>
                    <h4>Partner Users Only</h4>
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label for="email">email address or username</label>
                        <input type="text" name="pmailuser" class="input-text full-width" placeholder="Enter your Email or Username">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>

                        <input type="password" name="ppassword" class="input-text full-width" placeholder="Enter your Password">
                    </div>

                    <button type="submit" name="btn-partner-login" class="full-width btn-medium form-btn-custom">LOG IN</button>
                    <a href="../index.php" type="button" class="">GO BACK</a>
                </form>
            </div>

            <h5>Powered by HappyHolidayss (PVT) Ltd.</h5>

        </div>

    </section>

    <?php include('../includes/jsscripts.php'); ?>

</body>

</html>