<?
// Search for archived tours
if($showTours == "all"){
$query = "SELECT * from tours
        WHERE 
        closeDate <= '$curDate'
        ORDER BY closeDate DESC"; 
    $archive = true;
    $noIconTitle = "noIconTitle";
    $noIcon = "class='noIcon'";
    $type = "&type=a";
}

else{
    $query = "SELECT * from tours 
        WHERE 
        (openDate <= '$curDate' AND closeDate >= '$curDate')
        OR testing = '1'
            ";
}

$result = mysqli_query($db,$query);

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tourID = $row['tourID'];
        $title  = $row['title'];
        $image  = $row['image'];
        $length = $row['length'];
        $noStops = $row['noStops'];
        $iconType = $row['icon'];
        if($archive){
            $openDate  = $row['openDate'];
            $closeDate  = $row['closeDate'];
            $openDate = date("M j, Y", strtotime($openDate));
            $closeDate = date("M j, Y", strtotime($closeDate));
            $dates = "<span class='dates'>$openDate - $closeDate</span>";
        }
        else $dates = "";

        if($length && $noStops){
            $details = "<span>$length | $noStops stops</span>";
        }
        else $details = "";
$title = "<span class='title $noIconTitle'>$title</span>";
        if(!$archive){
            switch($iconType){
                case 1: $icon="<span class='icon main'></span>"; break;
                case 2: $icon="<span class='icon family'></span>"; break;
                case 3: $icon="<span class='icon square-3'></span>"; break;
            }
            
    }
    $stopList .= "<li>
                    <a href='tour?tourID=$tourID$type'
                    $noIcon
                    onclick=\"_gaq.push(['_trackEvent', 'Tours', '".strip_tags($title)."']);\"
                    >
                        $icon
                        $title
                        $details
                        $dates
                    </a>
                </li>";

        }
} 
else {
        $archive = true;
        $noTours = "<p class='noTours'>Currently, there are no active tours available.</p>";
        $showArchiveLink = "
        <li><a href='?tours=all' class='archive'>Tour Archive</a></li>";
}

?>