<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];

$pageTitle = "";

$helpNoShow = 1;

include "_inc/db_connect.php";

$email = $_POST['email'];

$useragent = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$timeStamp = date( "Y-m-d H:i:s");

$query =  "INSERT INTO newsletter 
(id, email, device, ip, date, confirmed) 
VALUES('', '$email', '$useragent', '$ip', '$timeStamp', '0')";

mysqli_query($db, $query);

require("_inc/mail/class.phpmailer.php");
require("_inc/mail/language/phpmailer.lang-en.php");
	  
	##############################
	#	Email Notification
	####################################
	$mail = new PHPMailer();			
	$mail->IsSMTP();            // set mailer to use SMTP
	$mail->Host = "localhost";  // specify main and backup server
	$mail->From = "digitalmedia@columbiamuseum.org";
	$mail->FromName = "";
	$mail->AddAddress("digitalmedia@columbiamuseum.org");
	//$mail->AddCC("jgoley@columbiamuseum.org");
	
	$mail->WordWrap = 100;                                 // set word wrap to 50 characters
	
	$mail->IsHTML(true);                                  // set email format to HTML
	
	
	$mail->Subject = "TAP into CMA eNewsletter Signup";
	$mail->Body    = "
	$email
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

<?
$pageCSS='
';

$pageJS = '
';

include("_inc/common-header.php"); 

?>
</head>

<body>
    <div data-role="page" id="newsletter">
        <? 
        $pageTitle = "eNewsletter";
		 $level = "../"; include "_inc/header.php"; 
		 ?>
	
	<section>
		<h1 style="text-align:center; font-size:32px">Thanks!</h1> 
    	<p>We appreciate your support.</p>
        <a href="index" data-role="button" class="backButton">Back to Tours</a>
    </section>
</div>

    <? include('_inc/footer.php'); ?>
    	
</body>


</html>