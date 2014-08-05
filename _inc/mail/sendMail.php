<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Message Sent</title>

<head>
<? include_once("../analytics.php"); ?>
</head>

<body>
<?php

$freindAddress = $_POST['freindAddress'];
$message = $_POST['message'];
$address = $_POST['address'];
$sendCopy = $_POST['sendCopy'];
$webpage = $_POST['webpage'];
$title = $_POST['title'];
$eventDate = $_POST['eventDate'];


if ($sendCopy){$toAddress=$freindAddress.", ".$address;}
else $toAddress=$freindAddress;

if (!$address){$address="jgoley@columbiamuseum.org";}

//$webpage= "http://www.columbiamuseum.org/calendar/index.php?".$webpage;

$message = "<html><body>
Your friend recommends you check out this event at the Columbia Museum of Art:<br /> 
<a href='$webpage'>$title</a><br />
$eventDate
<br><br>Your friend's message:<br />
$message</body></html>";

$subject='Check out this event at the Columbia Museum of Art!';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:'.$address.'' . "\r\n" .
    'Reply-To: '.$address.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($toAddress, $subject, $message, $headers);

echo "<script type='text/javascript'>window.close();</script>";


?>

</body>
</html>