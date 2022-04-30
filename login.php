<?php
include_once 'includes/dbconfig.php';

// Check if user is already logged in
if ($auth->is_logged_in()) {
    // Redirect logged in user to their home page
    $auth->redirect('customer/dashboard.php');
}

//Post the inputs
if(isset($_POST['btn-login']))
{
    // Retrieve form input
 $email = $_POST['EmailUname'];
 $uname = $_POST['EmailUname'];
 $pass = $_POST['Pass'];

// Check for empty and invalid inputs
if(empty($email)){
    echo '<script>alert("Please enter a valid Email or Username")</script>';
}
elseif(empty($pass)){
    echo '<script>alert("Please enter a valid Password")</script>';
}

else {
    // Check if the user may be logged in
    if($auth->customerlogin($uname,$email,$pass))
    {
    // Redirect if logged in successfully
    $auth->redirect('index.php');
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
                            <label for="email">email address or username</label>
                            <input name="EmailUname" type="text" class="input-text full-width" placeholder="Enter your Email or Username" required/>
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
