
<?
if($fromHome){
	$tourID = "";
	$curDate = date("Y-m-d");
	$query = "SELECT tourID FROM tours 
    WHERE 
    (openDate <= '$curDate' AND closeDate >= '$curDate')";
	$result = mysqli_query($db, $query);
	while($row = mysqli_fetch_assoc($result)){
		$tourID[] .= $row['tourID'];
		$query_stops = "SELECT tourID,stopID from tour_content GROUP BY stopID";
		$stops = $db->query($query_stops);		
		while($row = $stops->fetch_assoc()){
			$stopNums[] = $row['stopID'];
		}
	}
	$tourID = implode("_", $tourID);
}
else{
$curDate = date("Y-m-d");
	$query = "SELECT tourID,stopID from tour_content WHERE tourID = $tourID GROUP BY stopID";
	$result = $db->query($query);		
	while($row = $result->fetch_assoc()){
		$stopNums[] = $row['stopID'];
	}
}
?>
<form action="group" method="GET" id="stopSearch">
    <input type="tel" name="stopID" placeholder="Tap here &amp; enter a number" maxlength="3" />
    <input type="submit" value="Go" disabled="true" onClick=\"ga('send', 'Stop Number Input', 'Tapped');" />
    <input type="hidden" name="tourID" value="<?=$tourID?>" />
    <p></p>
</form>