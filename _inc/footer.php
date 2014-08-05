<?
if($back){ ?>

<footer>
	<a href="<?=$link?>">back</a>
</footer>

<?
}
?>

<? if($feedback){ ?>

<footer id="feedback-help">
    <ul>
        <li><a href="<?=$dir ?>help" class="help">Help</a></li><li><a href="<?=$dir ?>survey" class="feedback">Feedback</a></li>
    </ul>
</footer>

<? } ?>


<? include $dir."_inc/menu.php"; ?>


<script type="text/javascript" src="<?=$dir?>_js/global.js"></script>
<?=$pageJS; ?>

<? if($fromHome || $tourID){ ?>
<script>
$(function() {
    var stopNums = <? echo json_encode($stopNums); ?> ;
    $("input[name='stopID']").keyup(function() {
        var t = $(this).val();
        console.log(t);
        if ($.inArray(t, stopNums) >= 0 && t.length == 3) {
            var e = 1;
            $("input[type='submit']").removeAttr("disabled").addClass("goodGo")
        } else e || ($("input[type='submit']").attr("disabled", ""), $("input[type='submit']").attr("disabled", "true").removeClass("goodGo"));
        e = ""
    })
});
</script>

<? } ?>
