 <?php 

include "../_inc/db_connect.php";

$tourID = $_POST['tourID'];
$stopID = $_POST['stopID'];
$groupID = $_POST['groupID'];
$groupTitle = $_POST['groupTitle'];
$stopTitle = $_POST['stopTitle'];
$stopType = $_POST['stopType'];
$speaker = $_POST['speaker'];
$filename = $_FILES['file']['name'];

$query = "INSERT INTO tour_content
(
id,
tourID,
stopID,
groupTitle,
groupID,
stopType,
title,
description,
speaker,
speakerImage,
source
)
VALUES(
'',
'$tourID',
'$stopID',
NULL,
'$groupID',
'$stopType',
'$stopTitle',
NULL,
'$speaker',
NULL,
'$filename'
)
";
echo $query;

mysqli_query($db,$query);

 $target = "../assets/$tourID/"; 
 echo  $target;
 $target = $target . basename( $_FILES['file']['name']) ; 
 $ok=1; 
 
 //This is our size condition 
if ($uploaded_size > 350000) { 
	echo "Your file is too large.<br>"; 
	$ok=0; 
} 

 //Here we check that $ok was not set to 0 by an error 
if ($ok==0) { 
	echo "Sorry your file was not uploaded"; 
} 
 
 //If everything is ok we try to upload it 
else { 
	if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) { 
 		echo "The file ". basename( $_FILES['file']['name']). " has been uploaded"; 
	} 
	else { 
		echo "Sorry, there was a problem uploading your file."; 
 	} 
} 

echo "<h1>Stop Added</h1>";
 ?> 