<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];
$noCurrentTours = false;

$pageTitle = "TAP into CMA";
$page = "home";
$fromHome = 1;

include("_inc/db_connect.php");

$dbName = "2014_1";

//	calTime >= '$nowTime'

$curDate = date("Y-m-d");

$showTours = $_GET['tours'];

$tour = $_GET['tour'];
$query = "SELECT * from tours 
    WHERE 
    (openDate <= '$curDate' AND closeDate >= '$curDate')
    OR testing = '1'
		";

// Search for archived tours
if($showTours == "all"){
$query = "SELECT * from tours"; 
    $archive = 1;
    $noIconTitle = "noIconTitle";
    $noIcon = "class='noIcon'";
    $type = "&type=a";
}

$result = mysqli_query($db,$query);

if(mysqli_num_rows($result) <= 0){
    $noCurrentTours = true;
    $query = "SELECT * from tours"; 
    $archive = 1;
    $noIconTitle = "noIconTitle";
    $noIcon = "class='noIcon'";
    $type = "&type=a";
    $result = mysqli_query($db,$query);
}

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $tourID = $row['tourID'];
        $title  = $row['title'];
        $image  = $row['image'];
        $length = $row['length'];
        $noStops = $row['noStops'];
        $iconType = $row['icon'];

        if($archive){
            $openDate  = $row['openDate'];
            $closeDate  = $row['closeDate'];
            $openDate = date("M j, Y", strtotime($openDate));
            $closeDate = date("M j, Y", strtotime($closeDate));
            $dates = "<span class='dates'>$openDate - $closeDate</span>";
        }
        else $dates = "";

        if($length && $noStops){
            $details = "<span>$length | $noStops stops</span>";
        }
        else $details = "";

        if(!$showTours){
            switch($iconType){
                case 1: $icon="<span class='icon main'></span>"; break;
                case 2: $icon="<span class='icon family'></span>"; break;
                case 3: $icon="<span class='icon square-3'></span>"; break;
            }
    }
}

$title = "<span class='title $noIconTitle'>$title</span>";

$stopList .= "<li>
                    <a href='tour?tourID=$tourID$type'
                    $noIcon
                    onclick=\"_gaq.push(['_trackEvent', 'Tours', '".strip_tags($title)."']);\"
                    >
                        $icon
                        $title
                        $details
                        $dates
                    </a>
                </li>";

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
<div class="loading"></div>
    <div id="home">
        <? 
        if($showTours != "all"){$slimMenu = 1;} include("_inc/header.php"); ?>
        <nav>
            <ul id="home-nav" class="stop-list">
                <?=$stopList; ?>
            </ul>
        </nav>
        <? 
        if($showTours != "all" && !$noCurrentTours){
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