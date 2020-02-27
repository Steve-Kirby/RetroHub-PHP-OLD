<?php
//error_reporting(-1);
//ini_set('display_errors','on');
//set_error_handler("var_dump");
ob_start();
session_start();
include_once 'dbConnect.php';
include_once 'usercheck.php';
include_once 'navbar.php';
include_once 'sidebar.php';
include_once 'footer.php';
include_once 'add.php';
include_once 'wishlist.php';
?>
