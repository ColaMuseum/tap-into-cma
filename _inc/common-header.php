<?

$noGA = 1;

$currentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

?>
<title><?=$pageTitle?></title>
<meta charset="UTF-8" />
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
<link rel="shortcut icon"href="<?=$dir; ?>_images/icons/fav.ico" />
<?$time = time();?>
<link rel="stylesheet" href="<?=$dir; ?>_css/global.tour.css?<?=$time ?>" />
<?=$pageCSS ?>