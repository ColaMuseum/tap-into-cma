<header>
    <h1><?=$stopID.$pageTitle ?></h1>
    <a href="#" data-rel="back" data-icon="back" data-iconpos="left" class="top-button">Back</a>
    <? if(!$helpNoShow){ ?>
    <a href="<?=$topLevel ?>help" data-icon="info" data-iconpos="left" class="top-button">Help</a>
	<?}?>
    <? if ($listButton){ ?>
    <a href="#stops" data-icon="bars" data-role="button" data-iconpos="notext">Stops</a>
    <? } ?>
</header><!-- /header -->