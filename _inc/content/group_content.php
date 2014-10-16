<?

if(!$fromHome){
    $tourQuery = "tourID = $tourID";
}

// GET STOP TITLE
// $query = "SELECT groupTitle from tour_content WHERE $tourQuery $stopID AND title IS NULL 
//         ";

// $result = $db->query($query);
// while($row = $result->fetch_assoc()){
//     $groupTitle = $row['groupTitle'];
// }

$query = "SELECT * from tour_content WHERE
    ($tourQuery $stopID $groupID AND source IS NOT NULL)
    ORDER BY groupID
		";
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($result)){
    $i++;
    $stopID       = $row['stopID'];
    $tourID       = $row['tourID'];
    $groupID      = $row['groupID'];
    $groupTitle   = $row['groupTitle'];
    $stopType     = $row['stopType'];
    $title        = $row['title'];
    $description  = $row['description'] ? "<p>".$row['description']."</p>" : NULL;
    $speaker      = $row['speaker'];
    $speakerImage = $row['speakerImage'];
    $source       = $row['source'];

    if($groupID > 0){
        $stopTitle = $title;
    }
    else $stopTitle = $groupTitle;

    switch($stopType){
            case 1: $type = "<span class='video'></span>"; break;
            case 2: $type = "<span class='audio'></span>"; break;
            case 3: $type = "<span class='music'></span>"; $italicize = "class='music-title'"; break;
            case 4: $type = "<span class='image'></span>"; break;
            case 5: $type = "<span class='film'></span>";  $italicize = "class='music-title'"; break;
        }

    $stopInfo="<div class='stop-info'><h1 $italicize>$stopTitle</h1><h2>$speaker</h2>$description</div>";

    if($groupID == 0){
        $auto      = "autoplay";
        $soloVideo = "soloVideo"; 
        $soloAudio = "soloAudio"; 
    }
    else{ 
        $auto = "";
        $soloVideo = ""; 
        $soloAudio = ""; 
    }

    if($autoPlay){
        $auto = "autoplay";
    }

    // Video
    if ($stopType == 1 || $stopType == 5){
        $content = $stopInfo."
            <video class='video $soloVideo' name='$title' poster='assets/$tourID/speakers/$speakerImage-video.jpg' $auto controls>
                <source src='assets/$tourID/$source.mp4' type='video/mp4'>
            </video>
        ";
    }

    // AUDIO AND MUSIC

    else if ($stopType == 2 || $stopType == 3){
        // if( $stopType == 3){
        //     $place = "_images/audio_placeholder.jpg";
        // }
        // else $place = "assets/$tourID/speakers/$speakerImage.jpg";

        $place = "_images/audio_placeholder.gif";


    $content = $stopInfo."
            <video class='audio $soloAudio' name='$title' $auto controls poster='$place'>
                <source src='assets/$tourID/$source.mp4' type='video/mp4'>
            </video>
        ";
    }

    // PHOTOs
    else if ($stopType == 4){
        $photosOut = "<img src='assets/$tourID/$source.jpg' width='100%' />";
        $stopInfo = "<h1 class='imageTitle'>$title</h1><h2>$speaker</h2>";
        if ($description) $description = "<p>$description</p>";
        else $description = "";
        $content = $stopInfo."$photosOut".$description;
    }

    else if($stopType == 10){
    header("Location: newsletter.php");
}

    else{
        $content = "<h1>".$title."</h1>";
    }

    $stopList .= "<article>
                        $content
                    </article>";
}


?>