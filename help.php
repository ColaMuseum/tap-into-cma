<?

//$useragent = $_SERVER['HTTP_USER_AGENT'];

$pageTitle = "Help";

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

include("_inc/common-header.php"); 

?>
</head>

<body>
    <div id="help">
        
        <?
        include "_inc/header.php";
        ?>
        <section id="content">
            <article>
                <video
                    class='video'
                    name='Help Video'
                    poster='images/help/help-video-poster.png'
                    autoplay controls>
                    <source src='assets/help.mp4' type='video/mp4'>
                </video>
            </article>
        </section>
    </div>
    
    <? include '_inc/footer.php'; ?>
    
</body>


</html>