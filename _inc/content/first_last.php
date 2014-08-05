<?

$query = "SELECT stopID from tourStops 
            ORDER BY stopID ASC
            LIMIT 1
        ";
$result = $db->query($query);
$row = $result->fetch_assoc();
$firstStop = $row["stopID"];

$query = "SELECT stopID from tourStops 
            ORDER BY stopID DESC
            LIMIT 1
        ";
$result = $db->query($query);
$row = $result->fetch_assoc();
$lastStop = $row["stopID"];

?>

<?      

$prevStop = $stopID - 1;
$nextStop = $stopID + 1;

?>

        <!-- <div data-role="navbar">
            <ul>
                <? if($firstStop <= $prevStop){ ?>
                <li><a href="?tourID=<?=$tourID; ?>&stopID=<?=$prevStop; ?>"  data-icon="back" data-iconpos="" data-ajax='false'>Previous Stop (<?=$prevStop ?>)</a></li>
                <? } ?>
                <? if($lastStop >= $nextStop){ ?>
                <li><a href="?tourID=<?=$tourID; ?>&stopID=<?=$nextStop; ?>" data-icon="forward" data-iconpos="" data-ajax='false'>Next Stop (<?=$nextStop ?>)</a></li>
                <? } ?>
            </ul>
        </div> -->
        <? //include "../../inc/content/inc/stopSearch.php" ?>