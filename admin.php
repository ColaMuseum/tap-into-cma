<!DOCTYPE html>
<html>
<head>
<style>
	h1,h2,h3{
		margin:0;
		padding: 0;
	}
	h3{
		color:#999;
	}
	.groupStop{
		color:red;
	}
	.stop{
		margin-bottom: 40px;
	}
</style>
</head>

<body>
<?

include "_inc/db_connect.php";


####################################
#	Add Tour
######################################################

if($_GET["add"]){



}


####################################
#	Produce List of stops
######################################################

$tourID = $_GET["id"];


if(!$tourID){
	$query = "SELECT * FROM tours ORDER BY id ASC";
	$result = $db->query($query);

	while($row = $result->fetch_assoc()){
		$id = $row["tourID"];
		$title = strip_tags($row["title"]);
		$tours .= "<li><a href='?id=$id'>$id<br/>$title</a></li>";
	}

	echo "<ul>$tours</ul>";
}

else{

$query = "SELECT * FROM tour_content WHERE tourID = '$tourID' ORDER BY stopID, groupID ";
	$result = $db->query($query);
	$stops = array();
	while($row = $result->fetch_assoc()){

		$id = $row['id'];
		$tourID = $row['tourID'];
		$stopID = $row['stopID'];
		$groupTitle = $row['groupTitle'];
		$groupID = $row['groupID'];
		$stopType = $row['stopType'];
		$title = $row['title'];
		$description = $row['description'];
		$speaker = $row['speaker'];
		$speakerImage = $row['speakerImage'];
		$source = $row['source'];

		$stops[$stopID][$groupID][$groupTitle.$title] = 
		array("title" => $title,
			"Type" => $stopType, 
			"Speaker" => $speaker, 
			"Speaker Image" => $speakerImage, 
			"Source File" => $source);
	}
	foreach($stops as $stopID => $stopInfo)
	{ 
		echo "<div class='stop'>";
		$numStops = (count($stopInfo)-1);
		foreach($stopInfo as $key => $title){
			//Get Title and StopID of group/solo stop
			if($numStops > 0) $groupClass = "class='groupStop'";
			else $groupClass = "";
			if($key == 0){
				foreach($title as $groupTitle => $dets){
					echo "<div $groupClass><h1>".$stopID."</h1><h2>".$groupTitle."</h2></div>";
				}
			}
		}
		if ($key > 0 && count($stopInfo) > 1){
			echo "<h3>Number of stops in group: ".$numStops."</h3>";
			$i = 0;
			foreach($stopInfo as $key => $title){
				// Get all stops in group

				if($i >0){
				echo "<ul>";
					foreach($title as $key => $dets){
						foreach($dets as $det){
							echo "<li>$det</li>";
						}
					}
				echo "</ul>";
				}
				$i++;
			}
			// Get Stop info in a solo stop
		}
		else{
				echo "<ul>";
				foreach($title as $key => $dets){
					foreach($dets as $det){
						echo "<li>$det</li>";
					}
				}
				echo "</ul>";

			}
		echo "</div>";

	}
}
?>
</body>
</html>

