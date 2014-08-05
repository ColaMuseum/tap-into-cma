<?
include "../_inc/db_connect.php";

$query = "SELECT tourID FROM tours ORDER BY tourID";
	$result = mysqli_query($db,$query);
	$totalTours = mysqli_num_rows($result);

$tourID = $_POST['tourID'];
$title = $_POST['title'];
$openDate = $_POST['openDate'];
$closeDate = $_POST['closeDate'];
$image = $_POST['image'];

// echo
// $tourID.
// $title.
// $openDate.
// $closeDate.
// $image;
// id
// tourID
// title
// openDate
// closeDate
// image
// location
// details
// menu
// icon

$query = "INSERT INTO tours 
(
tourID,
title,
openDate,
closeDate,
image,
location,
details,
menu,
icon
)
values
(
'',
'$title',
'$openDate',
'$closeDate',
'$image',
'$location',
'$details',
'$menu',
'$icon'
)";

echo $query."<br/><br/><br/>";
if($db->query($query) === TRUE){
	echo "Tour added";
	$newDir = $totalTours+1;
	mkdir("../assets/$newDir", 0700);
}
  else echo "Not added."


?>
