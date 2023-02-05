<?php
error_reporting(0);

//Create Tracker Image
header('content-type: image/gif');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');

//Get Mail Number
$mail=$_GET['m'];

//Get IP
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
  $ip=$_SERVER['REMOTE_ADDR'];
}

//Get UA
$ua = $_SERVER['HTTP_USER_AGENT'];

//Get Time
$rawtime = time();
$date = date('Y.m.d', $rawtime);
$time = date('H:i:s', $rawtime);

//Write into Log
$myFile = "log.txt";
$fh = fopen($myFile, 'a+');
$stringData = $mail . ' ' . $date . ' ' . $time . ' ' . $ip . ' ' . $ua . ' ' . "\r\n";
fwrite($fh, $stringData);
fclose($fh);
?>
