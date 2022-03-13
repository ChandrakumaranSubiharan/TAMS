<?php
session_start();
include_once 'includes/dbconfig.php';
if(isset($_POST['btn-login']))
{
 $email = $_POST['email_id'];
 $pass = $_POST['pass'];
 
 if($auth->login($email,$pass))
 {
  header("Location: customer/dashboard.php?loged");
 }
 else
 {
  header("Location: login.php?failed");
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








<?php include('includes/header.php');?>

<div class="login-section">

<div class="login-box travelo-box">
                    <div class="simple-sign">
                            <a href="#" >LOGIN</a>
                    </div>
                    <form method='post'>
                        <div class="form-group">
                            <label for="email">email address</label>
                            <input name="email" type="text" class="input-text full-width" placeholder="Enter your Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>

                            <input name="pass" type="password" class="input-text full-width" placeholder="Enter your Password" required/>
                        </div>

                        <button type="submit" name="btn-login" class="full-width btn-medium form-btn-custom">LOG IN</button>

                    </form>
                    <div class="seperator"></div>
                    <p>Don't have an account? <a href="signup.php" class="#"> Sign up</a></p>
                </div>

</div>


<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
