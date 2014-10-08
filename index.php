<?

$pageTitle = "TAP into CMA";
$page = "home";
$fromHome = 1;

include("_inc/db_connect.php");

$curDate = date("Y-m-d");
$showTours = $_GET['tours'];
$tour = $_GET['tour'];

include("_inc/content/tour-list.php");

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
<div class="loading"></div>
    <div id="home">
        <? 
        if(!$archive){$slimMenu = 1;} include("_inc/header.php"); 
        // Message for no current tours.
        echo $noTours;
        ?>
        <nav>
            <ul id="home-nav" class="stop-list">
                <?=$showArchiveLink.$stopList; ?>
            </ul>
        </nav>
        <? 
        if(!$archive){
            include "_inc/stopSearch.php"; 
        }
        ?>

        <? 
        $feedback=1;
        include_once '_inc/footer.php'; 
        ?>
    </div>
</body>
</html>