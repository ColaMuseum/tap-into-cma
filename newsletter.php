<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];

$pageTitle = "";

$helpNoShow = 1;

?>

<!DOCTYPE html>
<html>
<head>

<?
$pageCSS='
';

$pageJS = '
';

include($dir."_inc/common-header.php"); 

?>
</head>

<body>
    <div id="newsletter">
    	

        <? 
        $pageTitle = "eNewsletter";
        include "_inc/header.php";
        ?>



    <section>
    <h2>Subscribe to our eNewsletter</h2>
    <form action="signup.php" method="post">
    <input type="email" value="" placeholder="Enter your email address" name="email" class="required email">
	<input type="submit" value="Subscribe" name="subscribe" class="button">
    </form>
    </section>
    <? include('_inc/footer.php'); ?>
    </div>
    	
</body>


</html>