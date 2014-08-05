<?
$dir = "../";
$page = "visit";
date_default_timezone_set("America/New_York");
$curDate = date('Y-m-d');
$topLevel = "../";

include "../_inc/db_connect.php";

$satisfaction = $_POST['satisfaction'];
$notSatisfied = $_POST['notSatisfied'];
$additions = $_POST['additions'];
$comments = $_POST['comments'];
$age = $_POST['age'];

$useragent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$timeStamp = date( "Y-m-d H:i:s");

$query =  "INSERT INTO survey 
(id, satisfaction, notSatisfied, additions, comments, age, device, ip, date) 
VALUES('', '$satisfaction', '$notSatisfied', '$additions', '$comments', '$age', '$useragent', '$ip', '$timeStamp')";

mysqli_query($db, $query);


require("../_inc/mail/class.phpmailer.php");
require("../_inc/mail/language/phpmailer.lang-en.php");
	  
	##############################
	#	Email Notification
	####################################
	$mail = new PHPMailer();			
	$mail->IsSMTP();            // set mailer to use SMTP
	$mail->Host = "localhost";  // specify main and backup server
	$mail->From = "confirmation@columbiamuseum.org";
	$mail->FromName = "";
	$mail->AddAddress("digitalmedia@columbiamuseum.org");
	//$mail->AddCC("jgoley@columbiamuseum.org");
	
	$mail->WordWrap = 100;                                 // set word wrap to 50 characters
	
	$mail->IsHTML(true);                                  // set email format to HTML
	
	
	$mail->Subject = "TAP into CMA Feedback Notification";
	$mail->Body    = "
	
	<strong>Satisfaction:</strong><p>$satisfaction </p>
	<strong>Not Satisfied:</strong><p>$notSatisfied</p>
	<strong>Any Additions:</strong><p>$additions</p>
	<strong>Additional Comments:</strong><p>$comments</p>
	<strong>Visited Museum?:</strong><p>$visited</p>
	<strong>Age:</strong><p>$age</p>
	<strong>Device</strong><p>$useragent</p>
	<strong>IP Address</strong><p>$ip</p>
	<strong>Date</strong><p>$timeStamp</p>
	
	";
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	//$mail->Send();
	
	if(!$mail->Send())
	{
	   echo "Message could not be sent. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

?>

<!DOCTYPE html>
<html>
<head>

<title>Thanks</title>

<? include("../_inc/common-header.php"); ?>

</head>

<body>
    <div id="thanks">
    
    <? $level = "../"; include "../_inc/header.php"; ?>
	
	<section>
		<h1 style="text-align:center; font-size:32px">Thanks!</h1> 
    	<p>We appreciate your feedback and support of the CMA.</p>
    	<a href="../newsletter" class="btn">
    	Subscribe to our eNewsletter</a>
    </section>

    </div>    

    <? include '../_inc/footer.php'; ?>    
</body>


</html>