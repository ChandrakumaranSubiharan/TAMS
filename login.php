<?php
session_start();
include_once 'includes/dbconfig.php';




// Check if log-in form is submitted
if (isset($_POST['log_in'])) {
    // Retrieve form input
    $user_name = trim($_POST['user_name_email']);
    $user_email = trim($_POST['user_name_email']);
    $user_password = trim($_POST['user_password']);

    // Check for empty and invalid inputs
    if (empty($user_name) || empty($user_email)) {
        array_push($errors, "Please enter a valid username or e-mail address");
    } elseif (empty($user_password)) {
        array_push($errors, "Please enter a valid password.");
    } else {
        // Check if the user may be logged in
        if ($user->login($user_name, $user_email, $user_password)) {
            // Redirect if logged in successfully
            $user->redirect('home.php');
        } else {
            array_push($errors, "Incorrect log-in credentials.");
        }
    }
}



if(isset($_POST['btn-login']))
{
 $email = $_POST['Email'];
 $uname = $_POST['Email'];
 $pass = $_POST['Pass'];



// Check for empty and invalid inputs
if(empty($email)){
    echo '<script>alert("Please enter a valid Email")</script>';
}
elseif(empty($pass)){
    echo '<script>alert("Please enter a valid Pass")</script>';
}

else {
    if($auth->customerlogin($uname,$email,$pass))
    {
    $auth->redirect('customer/dashboard.php');
    }
    else
    {
    echo '<script>alert("Incorrect log-in credentials.")</script>';
    }
}
}
?>









<?php include('includes/header.php');?>

<div class="login-section">

<div class="login-box travelo-box">
                    <div class="simple-sign">
                            <a href="#" >LOGIN</a>
                    </div>
                    <form method='post'>
                        <div class="form-group">
                            <label for="email">email address</label>
                            <input name="Email" type="text" class="input-text full-width" placeholder="Enter your Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>

                            <input name="Pass" type="password" class="input-text full-width" placeholder="Enter your Password" >
                        </div>

                        <button type="submit" name="btn-login" class="full-width btn-medium form-btn-custom">LOG IN</button>

                    </form>
                    <div class="seperator"></div>
                    <p>Don't have an account? <a href="signup.php" class="#"> Sign up</a></p>
                </div>

</div>


<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
