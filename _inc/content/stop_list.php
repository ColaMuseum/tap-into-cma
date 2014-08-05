<?

$tourImage = "<img src='_images/$tourID.jpg' class='tourImage' />";

// Get Tour Name 
$query = "SELECT image, title, menu, icon from tours WHERE tourID = $tourID
        ";
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($result)){
$image = $row['image'];
$tourTitle = $row['title'];
$icon = $row['icon'];
$stopTypeMenu = $row['menu'];
}

if($stopTypeMenu){
	$removeBorder="noBorder";
}

// TOUR ICON
switch($icon){
    case 1: $icon="<span class='icon main'></span>"; break;
    case 2: $icon="<span class='icon family'></span>"; break;
    case 3: $icon="<span class='icon square-3'></span>"; break;
}

$tourTitleOut = "<div class='tourTitle-wrap $removeBorder'>
<div><h1>".strip_tags($tourTitle)."</h1></div></div>";

$query = "SELECT * from tour_content 
            WHERE tourID = $tourID 
            ORDER BY stopID, groupID
		";
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($result)){

	unset($types);
	$showGroup   = "";
	$types       = "";
	
	$stopID      = $row['stopID'];
	$tourID      = $row['tourID'];
	$groupID     = $row['groupID'];
	$groupTitle  = $row['groupTitle'];
	$stopType    = $row['stopType'];
	$title       = $row['title'];
	$description = $row['description'];
	$source      = $row['source'];


	// store all stop numbers of tour in array - for stopsearch validaiton
	if($prevStop != $stopID) $stopNums[] = $stopID;
	$prevStop = $stopID;


	if($grouID == 0 && !$title){

		# GET NUMBER OF STOPS IN GROUP
		#########################################
		$count = "SELECT id from tour_content 
		            WHERE tourID = $tourID 
		            AND stopID = $stopID 
		            ORDER BY groupID
				";
		$count = mysqli_query($db,$count);
		$noStops = (mysqli_num_rows($count)) - 1;
		

		# GET STOP TYPES IN GROUP
		#########################################
		$innerQuery = "SELECT stopType from tour_content
		            WHERE tourID = $tourID 
		            AND stopID = $stopID 
		            GROUP BY stopType
		            ORDER BY groupID
				";

		$innerResult = mysqli_query($db,$innerQuery);
		
		# Add icons and class names
		#########################################		
		while($innerRow = mysqli_fetch_assoc($innerResult)){
			$type = $innerRow['stopType'];
			switch($type){
				case 1: $types .= "<li class='video'></li>"; $typeClass="audioStop"; break;
				case 2: $types .= "<li class='audio'></li>"; $typeClass="audioStop"; break;
				case 3: $types .= "<li class='music'></li>"; $typeClass="musicStop"; break;
				case 4: $types .= "<li class='image'></li>"; $typeClass="imageStop"; break;
				case 5: $types .= "<li class='film'></li>"; $typeClass="filmStop"; break;
			}	
		}

		# Add "Group" and number of stops in group
		#########################################
		if($groupID == 0 && !$source){
			$showGroup = "<span>Group ($noStops) |</span>";
			$typeClass = "groupStop";	
			$link      = "group?tourID=$tourID&stopID=$stopID";
		}
		# Add class to Non-group stops 
		#########################################
		else {
			$showGroup = "";
			$soloStop  = "soloStop";
			$link      = "group?tourID=$tourID&stopID=$stopID";
		}
	}

	# Add icon and class name to individual stops | special link to only individual stop
	#########################################
	if(!$groupTitle){
		$hideIt = "hidden";
		$showGroup = "";
		$types = "";
		$link = "group?tourID=$tourID&stopID=$stopID&groupID=$groupID";
		$stopID = $stopID.".".$groupID;
		switch($stopType){
			case 1: $types = "<li class='video'></li>"; $typeClass="audioStop"; break;
			case 2: $types = "<li class='audio'></li>"; $typeClass="audioStop"; break;
			case 3: $types = "<li class='music'></li>"; $typeClass="musicStop"; break;
			case 4: $types = "<li class='image'></li>"; $typeClass="imageStop"; break;
			case 5: $types = "<li class='film'></li>"; $typeClass="filmStop"; break;
		}
	}
	else $hideIt = "";


	$stopID_out = $stopID." | ";
	// NEWSLETTER SIGNUP
	if($stopType == 10) $stopID_out = $stopID;
	$stopList .= "<li class='$hideIt $typeClass $soloStop' ><a href='$link'	onClick=\"ga('send', 'event', '".strip_tags($tourTitle)."', '".strip_tags($groupTitle).strip_tags($title)."');\" ><span> $stopID_out $showGroup <ul>$types</ul> </span> $groupTitle $title </a></li>";
}

?>