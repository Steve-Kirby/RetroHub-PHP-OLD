<?php
//the string to be written to the file 
//date,ip, http user agent, and the url they have visited 
$line = date('Y-m-d H:i:s') . " | $_SERVER[REMOTE_ADDR] | " . "$_SERVER[HTTP_USER_AGENT]" . " | $_SERVER[REQUEST_URI]";
file_put_contents('visitors.txt', $line . PHP_EOL, FILE_APPEND);
?>