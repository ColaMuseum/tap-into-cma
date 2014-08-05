<?
// Get title of selected tour
	$query = "SELECT title FROM tours WHERE tourID = '$tourID'";
	$result = mysqli_query($db,$query);

	while($row = mysqli_fetch_assoc($result)){
		$title = strip_tags($row["title"]);
	}

echo "<h1>$title</h1>";

$query = "SELECT * FROM tour_content WHERE tourID = '$tourID' ORDER BY stopID, groupID ";
	$result = mysqli_query($db,$query);
	$stops = array();
	while($row = mysqli_fetch_assoc($result)){

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
		array(
			"title" => $title,
			"type" => $stopType, 
			"speaker" => $speaker, 
			"speaker_image" => $speakerImage, 
			"source_file" => $source,
			"id" => $id);
	}
	// echo "<pre>";
	// print_r($stops);
	// echo "</pre>";
	 echo "<ul>";
	foreach($stops as $stopID => $stopInfo)
	{ 

		echo "<li class='stop'>";
		$numStops = (count($stopInfo)-1);
		foreach($stopInfo as $key => $title){
			//Get Title and StopID of group/solo stop
			if($numStops > 0) $groupClass = " groupStop";
			else $groupClass = "";
			if($key == 0){
				foreach($title as $groupTitle => $dets){
					echo "<div class='stopTitle $groupClass'><h1>".$stopID."</h1><h2>".$groupTitle."</h2></div>";
				}
			}
		}
		if ($key > 0 && count($stopInfo) > 1){
			//echo "<h3>Number of stops in group: ".$numStops."</h3>";
			$i = 0;
			echo "<ul class='subStop'>";
				$s=0;
			foreach($stopInfo as $key => $title){
				// Get all stops in group
				if($i >0){
				echo "<li id='id_$id'><ul class='subStops'>";

					$s++;
					foreach($title as $key => $dets){
						echo "<li>$s</li>
						<li class='title'>".$dets['title']."</li>
						<li>".$dets['speaker']."</li>
						<li>".$dets['speaker_image']."</li>
						<li>".$dets['source_file']."</li>";
					}
				echo "</ul></li>";
				}
				$i++;
			}
			echo "</ul>";
			// Get Stop info in a solo stop
		}
		else{
				echo "<ul class='subStop'>";
				foreach($title as $key => $dets){
					foreach($dets as $det){
						echo "<li>$det</li>";
					}
				}
				echo "</ul>";

			}
	if (!$stopID){
		echo "No stops have been added";
	}
		echo "</li>";
	}
	echo "</ul>";

?>