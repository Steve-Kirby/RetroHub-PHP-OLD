<?php
//require 'PHPMailer/PHPMailerAutoload.php';
//error_reporting(-1);
//ini_set('display_errors', 'On');
//set_error_handler("var_dump");
 ob_start();
 session_start();
 include_once 'dbConnect.php';
 include_once 'usercheck.php';
 include_once 'navbar.php';
 
?>
 <div class="container-fluid" style='margin-right:10px;margin-left:10px;margin-top:60px;'>
    <div class="row">
            <div class="col-md-12">
				<div class="row">
				<p class="lead">Contact us by Email!</p>		
<!-- Contact Form - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" action="mail.php" method="get">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-1 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-10">
                                <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-1 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-10">
                                <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-1 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-10">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-1 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-10">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                           <span class="col-md-1 col-md-1 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-10">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you as soon as possible!" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="action" value="send" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>

<!-- Contact Form - END -->

<div class="row">
				<div class="col-md-4">
				<p class="lead">Contact us by Phone!</p>
				</div>
				
				<div class="col-md-4" >
				<p class="lead" style="text-align:center;"> </p>

				<p class="lead" style="text-align:center;">01234 567890</p>
				<p class="lead" style="text-align:center;">01234 567890</p>
				<p class="lead" style="text-align:center;">01234 567890</p>
				<br>
				<br>
				<p style="text-align:center;">Opening hours: </p>
				<p style="text-align:center;">Monday-Friday:10am-6pm gmt</p>
				<p style="text-align:center;">Saturday & Sunday:11am-3pm gmt</p>
				</div>        
</div>
    <!-- /.container -->
<?php include 'footer.php'; ob_end_flush(); ?>
