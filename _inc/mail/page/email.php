<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Send a page to a friend</title>

<script type="text/javascript">
function reSize(){
	window.resizeTo(475,650);
	}

</script>

<style type="text/css">
a:LINK, a:VISITED, a:ACTIVE {
color:#C33;
text-decoration:underline;
}
a:HOVER, a:VISITED:HOVER {
color:#0FB9E4;
text-decoration:none;
}
body{ background-color:#FFFFFF; font-family:'Myriad','lucida grande', Georgia, Arial, sans-serif; font-size:12px; margin:10px 0 0 20px;}
p {margin-bottom:0;}
h1{margin:0 0 2px 0; font-size:12px; color:#000;} 
h2{margin:20px 0 2px 0; font-size:12px; color:#000;} 

</style>
<? include_once("../../analytics.php"); ?>
</head>

<body>
<!--onLoad="javascript:reSize();"-->
<img src="../../../images/header/logo.gif" style="margin-bottom:20px" />
<h1>Here's the page you are sending:</h1>
  <?php
  
  require('../../../inc/common/connect.php');

function get_param($param_name)
{
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;

  $param_value = "";
  if(isset($HTTP_POST_VARS[$param_name]))
    $param_value = $HTTP_POST_VARS[$param_name];
  else if(isset($HTTP_GET_VARS[$param_name]))
    $param_value = $HTTP_GET_VARS[$param_name];

  return $param_value;
}

$eventID = get_param('id');
$date = get_param('date');
list ($y, $m, $d) = explode ("-", $date);
$eventDate = date( 'F j, Y', mktime(0,0,0,$m,$d,$y));

$query = "SELECT calTitle FROM cma_cal_programs WHERE calPublish=0 AND
			calID = '$eventID'";
	$result = mysql_query($query);	
	if ($result && mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
			$title = $row['calTitle'];
		}
	}

//echo $page;
$webpage= "http://www.columbiamuseum.org/events/calendar?date=$date&event=$eventID";

echo "<br /><strong><a href=$webpage target='_BLANK'>$title</a></strong><br />$eventDate<br />";
?>

<form method="post" action="../sendMail.php" style="margin:20px 0 0 0;" >
<h1>Enter the email address of the recipient:</h1>
<input type="text" name="freindAddress"><br>
<em style="font-size:10px;">Separate multiple addresses with commas.</em>
<h2>Add your own personal message:</h2>
<textarea name="message" rows="5" cols="50"></textarea>
<h2>Enter your email address:</h2>
<input type="text" name="address">

<h2>Send a copy to myself?
  <input type="checkbox" name="sendCopy"></h2>

<p style="font-style:italic; font-size:10px; width:350px; margin:5px 0 0 0">Your email address will only be used to let the recipient know who sent the event. Both your address and the recipient's address will not be used for any other purpose.</p>
<input type="hidden" value="<? echo $webpage; ?>" name="webpage" />
<input type="hidden" value="<? echo $title; ?>" name="title" />
<input type="hidden" value="<? echo $eventDate; ?>" name="eventDate" />
<input type="submit" value="Send" style="margin-top:15px;" />
</form>

</body>
</html>