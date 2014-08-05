<section id="menu">
    <h1>TAP into CMA</h1>
    <ul>
        <? if (!$slimMenu) { ?>
        <li><a href="../<?=$level?>" class="current">Current Tours</a></li>
        <? } ?>
        <li><a href="../<?=$level?>?tours=all" class="archive">Tour Archive</a></li>
        <li class="addSpace" ><a href="<?=$level?>help" class="help">Help</a></li>
        <li><a href="<?=$level?>survey/" class="feedback">Feedback</a></li>
    </ul>
    <a href="" class="btn trigger"></a>
</section>