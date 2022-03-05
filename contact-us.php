<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php include('includes/header.php');?>

<section id="content">
        <div class="container">
            <div id="main">
                <div class="contact-address row block">
                    <div class="col-md-4">
                        <div class="icon-box style5">
                            <i class="soap-icon-phone"></i>
                            <div class="description">
                                <small>We are on 24/7</small>
                                <h5>Local: +(094) 125-4985-214-SAY HELLO</h5>
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
                        <form action="contact-us-handler.php" method="post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="name" class="input-text full-width">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="text" name="email" class="input-text full-width">
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
                                <button class="btn-medium full-width">SEND MESSAGE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/jsscripts.php');?>
<?php include('includes/footer.php');?>
</body>
</html>