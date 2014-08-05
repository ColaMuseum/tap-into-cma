

<section id="addStop">
<form method="POST" enctype="multipart/form-data" action="addStopProcess.php">

<label for="isGroup">Group Stop?</label>
<input type="checkbox" name="isGroup"> 

<div id="groupStop">
	<h1>Group Stop</h1>
	<label for="stopID" >Stop Number</label>
	<input name="stopID" type="text">

	<label for="groupTitle" >Group Title</label>
	<input name="groupTitle" type="text">
</div>

<div id="singleStop">
	<h1>Single Stop</h1>
	<label for="stopID" >Stop Number</label>
	<input name="stopID" type="text">
	<label for="stopTitle" >Title</label>
	<input name="stopTitle" type="text">

	<label for="groupID" >Group Number</label>
	<input name="groupID" type="text">

	<label for="stopType">Stop Type:</label>
	<select name="stopType">
		<option value="1">Video</option>
		<option value="2">Audio</option>
		<option value="3">Music</option>
		<option value="4">Image</option>
		<option value="5">Film</option>
	</select>
	
	<?
	$query = "SELECT * FROM tours WHERE tourID = $tourID";
		$result = mysqli_query($db,$query);
		while($row = mysqli_fetch_assoc($result)){
			$speakers = explode("; ",$row['speakers']);
		}
		//print_r($speakers);
	?>

	<label for="speaker">Speaker:</label>
	<select name="speaker">
		<?
		foreach ($speakers as $key => $speaker) {
			echo "<option value='$speaker'>$speaker</option>";
		}
		?>
		<option value="NULL">NA</option>
	</select>

	<label for="file">Upload Media:</label>
	<input type="file" name="file" id="file">
</div>

<input type="hidden" name="tourID" value="<?=$tourID ?>">

<input type="submit" value="Create Stop">

</form>
</section>