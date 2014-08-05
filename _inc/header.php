<?

if($noStick)$noStick = "id='group-header'";
else $noStick = "";

?>
<header <?=$noStick?>>  
	<? if($home){ ?>
	<h1><a href="/">TAP into CMA</a></h1>
	<? } 
	else {
		if($page == "tour"){
			$backLink = "../";
		}
		else{
			$backLink = $_SERVER['HTTP_REFERER'];
		}
	if(!$slimMenu){
	?>
	<h1 class="menu-logo center-logo"><a href="/">TAP into CMA</a></h1>
	<a href="<?=$backLink ?>" class="backBtn">Back</a>
	<? }
	else{ ?>
		<h1 class="menu-logo"><a href="/">TAP into CMA</a></h1>
	<?
	}
	} ?>

	<a href="" class="trigger"><span>Menu</span></a>
<!--         <ul>
            <li><a href="<?=$level; ?>index" data-icon="home">Tours</a></li>
            <li><a href="<?=$level; ?>help" data-icon="info">Help</a></li>
            <li></li>
        </ul> -->
</header>