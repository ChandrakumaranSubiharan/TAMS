<?php
include_once 'includes/dbconfig.php';

if(isset($_POST['btn-save']))
{
// Retrieve form input
 $fname = $_POST['ufname'];
 $lname = $_POST['ulname'];
 $address = $_POST['uaddress'];
 $uname = $_POST['uname'];
 $email = $_POST['uemail'];
 $contact = $_POST['ucontact'];
 $pass = $_POST['pass'];

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
    elseif (empty($pass)) {
        echo '<script>alert("Please enter a valid Password.")</script>';
    } 
    else {
    // Check if the customer may be registred

        if($customer->create($fname,$lname,$address,$uname,$email,$contact,$pass))
        {
         header("Location: signup.php?inserted");
        }
        else
        {
         header("Location: signup.php?failure");
        }
    }

}

?>


<?php
if(isset($_GET['inserted']))
{
 ?>
<script>
    window.location.href='includes/SuccessMsg.php';
    </script>"; 
    <?php
}
else if(isset($_GET['failure']))
{
 ?>
<script>
    window.location.href='includes/FailMsg.php';
    </script>"; 
    <?php
}
?>

<?php include('includes/header.php');?>

<div class="signup-section">


<div class="signup-box travelo-box">
                    <div class="simple-sign">
                            <a href="#" >SIGN UP</a>
                    </div>
                    <div>
                        <form method="POST" >
                            <div class="form-group">
                                <div class="col-md-6">
                                <label for="first name">First Name</label>
                                <input type="text" name='ufname' class="input-text full-width" placeholder="Enter Your First Name" required/>
                                </div>
                                <div class="col-md-6">
                                <label for="last name">Last Name</label>
                                <input type="text" name='ulname' class="input-text full-width" placeholder="Enter Your Last Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="address">Address</label>
                                <input type="text" name='uaddress' class="input-text full-width" placeholder="Enter Your Address" required/>
                            </div>
                            <div class="form-group">
                            <label for="contact">Contact</label>
                                <input type="text" name='ucontact' class="input-text full-width" placeholder="Enter Your Contact Number" required/>
                            </div>
                            <div class="form-group">
                            <label for="email">Email</label>
                                <input type="text" name="uemail" class="input-text full-width" placeholder="Enter Your Email" required/>
                            </div>
                            <div class="form-group">
                            <label for="username">Username</label>
                                <input type="text" name="uname" class="input-text full-width" placeholder="Enter Username" >
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                                <input type="password" name="pass" class="input-text full-width" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" required/> I accept <a href="#travelo-login" class="goto-login soap-popupbox">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="btn-save" class="full-width btn-medium">SIGNUP</button>
                        </form>
                    </div>
                    <div class="seperator"></div>
                    <p>Have an Account? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
                </div>

</div>


<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
