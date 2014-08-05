<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];

include("_inc/db_connect.php");
$page = "tour";

//	calTime >= '$nowTime'

$tourID = $_GET['tourID'];
$old = $_GET['type'];

//$groupTitle = $_GET['groupTitle'];

include "_inc/content/stop_list.php";

$pageTitle = strip_tags($tourTitle);
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
<div id="tour">
    <? include "_inc/header.php"; ?>

    <? if($tourImage) echo $tourImage ?>

    <div class="tourTitle"><?=$tourTitleOut ?></div>
    
    <? 
    // Include Stop number entry form. If the tour is archived do not show
    if($old != "a"){
        include "_inc/stopSearch.php";
    }
    ?>

    <? if ($stopTypeMenu){ 
        $category = "All Stops";
        ?>
    <div id="selector" >
            <ul>
                <li class="selected"><a href="#" onclick="_gaq.push(['_trackEvent', 'Stop Type Menu', 'All']);" id="all"  data-icon="bullets" data-iconpos="notext" class="ui-icon-myicon-all"></a></li>
                <li><a href="#" onclick="_gaq.push(['_trackEvent', 'Stop Type Menu', 'Audio']);" id="audio" data-icon="audio" class="ui-icon-myicon-audio"  data-iconpos="notext"></a></li>
                <li><a href="#" onclick="_gaq.push(['_trackEvent', 'Stop Type Menu', 'Music']);" id="music" data-icon="star" class="ui-icon-myicon-music" data-iconpos="notext"></a></li>
                <li><a href="#" onclick="_gaq.push(['_trackEvent', 'Stop Type Menu', 'Film']);" id="film" data-icon="video" class="ui-icon-myicon-film" data-iconpos="notext"></a></li>
                <li><a href="#" onclick="_gaq.push(['_trackEvent', 'Stop Type Menu', 'Image']);" id="image" data-icon="camera" class="ui-icon-myicon-image" data-iconpos="notext"></a></li>
            </ul>
        </div><!-- /navbar -->
    <h2 id="category"><?=$category ?></h2>
    <? } ?>

    <nav >
        <ul class="stop-list" >
            <?=$stopList; ?>
        </ul>
    </nav>
</div>
    <? include('_inc/footer.php'); ?>
    <? if ($stopTypeMenu){ ?>
    <script>
$(function () {
    $("#selector li a").on("click", function () {
        var e = $(this).attr("id");
        var t = $(".stop-list li");
        $("#selector li").removeClass("selected");
        if (e == "all") {
            t.fadeIn().filter(".hidden").fadeOut();
        } else t.fadeOut().filter("." + e + "Stop").fadeIn();
        switch (e) {
        case "all":
            $("#category").show().text("All Stops");
            $(this).parent().addClass('selected');
            break;
        case "audio":
            $("#category").show().text("Commentary");
            $(this).parent().addClass('selected');
            break;
        case "music":
            $(this).parent().addClass('selected');
            $("#category").show().text("Musical Selections");
            break;
        case "film":
            $(this).parent().addClass('selected');
            $("#category").show().text("Films");
            break;
        case "image":
            $(this).parent().addClass('selected');
            $("#category").show().text("Images");
            break
        }
        return false;
    });
    $("input[name='stopID']").val("")
})
</script>
    <? } ?>
</body>

</html>