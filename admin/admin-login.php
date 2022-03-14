<?php
session_start();
include_once '../includes/dbconfig.php';
if(isset($_POST['btn-admin-login']))
{
 $email = $_POST['Email'];
 $pass = $_POST['pass'];
 
 if($auth->login($email,$pass))
 {
  header("Location: dashboard.php?loged");
 }
 else
 {
  header("Location: admin-login.php?failed");
 }
}
?>

<?php
if(isset($_GET['loged']))
{
 ?>
 <script>alert('Succesfully Loged in');</script>"; 
    <?php
}
else if(isset($_GET['failed']))
{
 ?>
 <script>alert('Failed to Loged in');</script>"; 
    <?php
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

    <section id="admin-login">

        <div class="user-login-form-container">

            <div id="travelo-login" class="travelo-box">
                <div class="sign">
                    <img src="../assets/images/icon.svg" alt="">
                    <h3>Login</h3>
                        <h4>Administrator Users Only</h4>
                </div>
                <form method='post'>
                    <div class="form-group">
                        <label for="email">email address</label>
                        <input name="Email" type="text" class="input-text full-width" placeholder="Enter your Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>

                        <input name="pass" type="password" class="input-text full-width" placeholder="Enter your Password" required/>
                    </div>

                    <button type="submit" name="btn-admin-login" class="full-width btn-medium form-btn-custom">LOG IN</button>

                </form>
            </div>

            <h5>Powered by HappyHolidayss (PVT) Ltd.</h5>

        </div>

    </section>
    
<?php include('../includes/jsscripts.php');?>

</body>
</html>