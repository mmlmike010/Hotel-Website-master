<?php include 'session.php';?>
<?php
	$choice = mysqli_real_escape_string($db,$_GET['choice']);
	$type = mysqli_real_escape_string($db,$_GET['type']);

	if($type == "breakfast")
	{
		$query = "SELECT b.bType, h.location FROM breakfast b, hotel h WHERE b.HotelID = h.HotelID AND b.HotelID = '$choice'";
		$result = mysqli_query($db,$query);
		while ($row = mysqli_fetch_array($result)) 
		{
			echo "<option>" . $row{'bType'} . "</option>";
		}
	}
	else if ($type == "service")
	{
		$query = "SELECT s.sType, h.location FROM service s, hotel h WHERE s.HotelID = h.HotelID AND s.HotelID = '$choice'";
		$result = mysqli_query($db,$query);
		while ($row = mysqli_fetch_array($result)) 
		{
			echo "<option>" . $row{'sType'} . "</option>";
		}
	}
	
?>