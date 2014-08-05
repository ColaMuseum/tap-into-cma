<?

if(!$fromHome){
    $tourQuery = "tourID = $tourID";
}

// GET STOP TITLE
$query = "SELECT groupTitle from tour_content WHERE $tourQuery $stopID AND title IS NULL 
        ";
$result = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($result)){
    $groupTitle = $row['groupTitle'];
}


?>