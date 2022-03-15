<?php
include_once 'includes/dbconfig.php';

if(isset($_POST['btn-partner-save']))
{
// Retrieve form input
 $fname = $_POST['pfname'];
 $lname = $_POST['plname'];
 $email = $_POST['pmail'];
 $gender = $_POST['pgender'];
 $contact = $_POST['pcontact'];
 $address = $_POST['paddress'];
 $province = $_POST['pprovince'];
 $zipcode = $_POST['pzipcode'];
 $uname = $_POST['puname'];
 $pass = $_POST['ppassword'];

    // Check for empty and invalid inputs
    if(empty($fname)){
        echo '<script>alert("Please enter a valid First Name")</script>';
    }
    elseif(empty($lname)){
        echo '<script>alert("Please enter a valid Last Name")</script>';
    }
    elseif(empty($address)){
        echo '<script>alert("Please enter a valid Address")</script>';
    }
    elseif (empty($uname)) {
        echo '<script>alert("Please enter a valid Username")</script>';
    }
    elseif (empty($email)) {
        echo '<script>alert("Please enter a valid Email")</script>';
    }  
    elseif (empty($contact)) {
        echo '<script>alert("Please enter a valid Contact No")</script>';
    }
    elseif (empty($province)) {
        echo '<script>alert("Please Select a valid Province")</script>';
    }  
    elseif (empty($zipcode)) {
        echo '<script>alert("Please enter a valid ZipCode")</script>';
    }  
    elseif (empty($gender)) {
        echo '<script>alert("Please Select valid Gender Type")</script>';
    }    
    elseif (empty($pass)) {
        echo '<script>alert("Please enter a valid Password.")</script>';
    } 
    else {
    // Check if the partner may be registred

        if($partner->create($fname,$lname,$address,$uname,$email,$contact,$pass,$province,$zipcode,$gender))
        {
         header("Location: become-partner.php?success");
        }
        else
        {
         header("Location: become-partner.php?failed");
        }
    }
}

?>


<?php
if(isset($_GET['success']))
{
    $msg = "Congratulations, your account has been successfully created but Wait until it get verified by happyholidayss team.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
else if(isset($_GET['failed']))
{
    $msg = "Oops !, We could not proccess your request to become a partner in happyholidayss....please try again or contact us.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php include('includes/header.php');?>

<section id="become-partner"> 

    <div class="become-partner-container besection parallax" data-stellar-background-ratio="0.5">
            <div class="container overlay">
                <h1 class="text-center">Try hosting on HappyHolidayss <br> join us. We'll help you every step of the way.</h1>
                <br>
                <div class="partner-form">
                    <div class=" travelo-box">
                        <div class="form-header">
                                <a href="#" >Become a Host</a>
                        </div>
                        <div>
                            <form method="POST">
                                <div class="form-group">
                                <label for="first name">First Name <strong>*</strong> </label>
                                    <input type="text" name="pfname" class="input-text full-width" placeholder="Enter Your First Name">
                                </div>
                                <div class="form-group">
                                <label for="first name">Last Name<strong>*</strong></label>
                                    <input type="text" name="plname" class="input-text full-width" placeholder="Enter Your Last Name">
                                </div>
                                <div class="form-group">
                                <label for="first name">Email Address<strong>*</strong></label>
                                    <input type="text" name="pmail" class="input-text full-width" placeholder="Enter Your Email Address">
                                </div>
                                <span>
                                    <div class="form-group-half">
                                        <label>Gender</label>
                                        <div class="selector">
                                            <select name="pgender" class="full-width">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="prefered not to say">Prefer not to say</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group-half">
                                        <label for="contact">Contact<strong>*</strong></label>
                                        <input type="text" name="pcontact" class="input-text full-width" placeholder="Enter your Contact Number">
                                    </div>
                                </span>
                                <div class="form-group">
                                    <label for="address">Address<strong>*</strong></label>
                                        <input type="text" name="paddress" class="input-text full-width" placeholder="Enter your Address">
                                </div>
                                <span>
                                    <div class="form-group-half">
                                        <label for="province">Province<strong>*</strong></label>
                                        <div class="selector">
                                            <select name="pprovince" class="full-width">
                                                <option value="Northern">Northern</option>
                                                <option value="North Western">North Western</option>
                                                <option value="Western">Western</option>
                                                <option value="North Central">North Central</option>
                                                <option value="Central">Central</option>
                                                <option value="Sabaragamuwa">Sabaragamuwa</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Uva">Uva</option>
                                                <option value="Southern">Southern</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group-half">
                                        <label for="zipcode">Zipcode<strong>*</strong></label>
                                        <input type="text" name="pzipcode" class="input-text full-width" placeholder="Enter the Area Zip code">
                                    </div>
                                </span>
                                <div class="form-group">
                                    <label for="username">Username<strong>*</strong></label>
                                        <input type="text" name="puname" class="input-text full-width" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password<strong>*</strong></label>
                                        <input type="password" name="ppassword" class="input-text full-width" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I accept <a href="#travelo-login" class="tac goto-login soap-popupbox">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" name="btn-partner-save" class="full-width btn-medium">REGISTER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
</body>
</html>