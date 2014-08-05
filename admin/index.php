<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../_css/admin.css"/>
</head>

<body>
<?

include "../_inc/db_connect.php";


####################################
#	Add Tour
// $tourID = $_POST['tourID']
// $title = $_POST['title']
// $openDate = $_POST['openDate']
// $closeDate = $_POST['closeDate']
// $image = $_POST['image']
// $location = $_POST['location']
// $length = $_POST['length']
// $noStops = $_POST['noStops']
// $details = $_POST['details']
// $menu = $_POST['menu']
// $testing = $_POST['testing']
// $show = $_POST['show']
// $icon = $_POST['icon']
######################################################



if($_GET["add"]){ ?>

<form action="addTour.php" method="POST">
	<label for="tourID">Tour Title</label>
	<input type="text" name="title" />
	<label for="tourID">Opening Date</label>
	<input type="text" name="openDate" />
	<label for="tourID">Closing Date</label>
	<input type="text" name="closeDate" />
	<label for="tourID">Image</label>
	<input type="text" name="image" />
	<input type="submit" name="submit" value="Create Tour" />

</form>

<?
}


####################################
#	Produce List of stops
######################################################

$tourID = $_GET["id"];


if(!$tourID){
	$query = "SELECT * FROM tours";
	$result = mysqli_query($db,$query);

	while($row = mysqli_fetch_assoc($result)){
		$id = $row["tourID"];
		$title = strip_tags($row["title"]);
		$tours .= "<li><a href='?id=$id'>$title</a></li>";
	}

	echo "<ul>$tours</ul>";
}

else{
	include "addStop.php";
	include "tourStops.php";
}
?>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
$(".stopTitle").on("click",function(){
	$(this).next().toggle();
})
</script>
</body>
</html>

