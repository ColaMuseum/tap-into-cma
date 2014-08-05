<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];
//$pageTitle = "Columbia Museum of Art";

include("_inc/db_connect.php");
$page = "stop";

//	calTime >= '$nowTime'
$stopID     = $_GET['stopID'];
if($_GET['tourID']) $tourID = $_GET['tourID'];
else $tourID = substr($stopID, 0,1);
$groupTitle = $_GET['groupTitle'];

if(strlen($tourID) > 1){
    $fromHome = 1;
    $tourID = explode("_", $tourID);
    foreach($tourID as $tour){
        if ($i > 0) $or = "OR";
        $tourQuery .= " $or tourID = $tour";
        $i++;
    }
$tourQuery = "(".$tourQuery.")";
}

$groupID = $_GET["groupID"];
if($groupID){
    $groupTitle_out = $stopID.".".$groupID;
    $groupID = "AND groupID = '$groupID'";
    $autoPlay = 1;
}

if($stopID)$stopID = "AND stopID = '$stopID'";

//$listButton =1;

include "_inc/content/stop_title.php";
include "_inc/content/group_content.php";

?>

<!DOCTYPE html>
<html>
<head>

<?
$pageCSS='
';

// $("video").bind("play",function(){
//         var title = $(this).attr("name");
//         _gaq.push([\'_trackEvent\', \'Played Content\', title]);
//     });

$pageJS = '
<script>$(function(){$(".video, .audio").bind("ended", function(){$(this)[0].webkitExitFullscreen();})
$(".soloVideo, .soloAudio").bind("ended", function(){window.location.href = "tour?tourID='.$tourID.'&db='.$dbName.'";});
    });
</script>
';

include("_inc/common-header.php"); 
?>
</head>

<body>
    
<div class="loading"></div>
    <div id="groups">
        <? $noStick =1; include "_inc/header.php"; ?>

            <section id="group-list">
                <?=$stopList; ?>
            </section>

    <a href="<?=$_SERVER['HTTP_REFERER'] ?>" class="backButton">Back</a>
    </div>

        <? 
        include('_inc/footer.php'); ?>
</body>

</html>