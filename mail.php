<?php
$action=$_GET['action'];
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$message=$_GET['message'];

$to = "@hotmail.com";
$subject = "Sent from contact form on retrohub.co.uk";
$txt = $fname." ".$lname." ('".$email."/".$phone."') ".$message;

mail($to,$subject,$txt);

header( 'Location: https://retrohub.co.uk/index.php' ) ;
?> 