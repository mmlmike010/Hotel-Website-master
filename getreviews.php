<?php include 'session.php';?>
<?php

	$type = mysqli_real_escape_string($db, $_GET['type']);

	echo "<table style='width: 100%;' border='3' cellpadding='10'>";
	echo "<tr>";
	echo "<th width = 20%>User</th>";
	echo "<th width = 20%>Hotel</th>";
	

	if($type == "breakfast")
	{
		$sql = "SELECT c.name, r.Rating, h.location, r.TextComment, br.bType 
		FROM review r, customer c, breakfastreview br, hotel h 
		WHERE r.CID = c.CID AND r.ReviewID = br.ReviewID AND h.HotelID = br.hotelNo";
		echo "<th width = 10%>Type</th>";
	}
	else if($type == "service")
	{
		$sql = "SELECT c.name, r.Rating, h.location, r.TextComment, sr.sType 
		FROM review r, customer c, servicereview sr, hotel h 
		WHERE r.CID = c.CID AND r.ReviewID = sr.ReviewID AND h.HotelID = sr.hotelNo";
		echo "<th width = 10%>Type</th>";
	}
	else if($type == "room")
	{
		$sql = "SELECT c.name, r.Rating, h.location, r.TextComment, rr.Room_no 
		FROM review r, customer c, roomreview rr, hotel h 
		WHERE r.CID = c.CID AND r.ReviewID = rr.ReviewID AND h.HotelID = rr.hotelNo";
		echo "<th width = 10%>Room</th>";
	}
	
	echo "<th width = 5%>Rating</th>";
	echo "<th width = 50%>Comment</th>";
	echo "</tr>";

	$rs = mysqli_query($db,$sql);

	if($type == "breakfast"){
		while($result=mysqli_fetch_array($rs))
		{
			echo '<tr>
			<td>'.$result["name"].'</td>
			<td>'.$result["location"].'</td>
			<td>'.$result["bType"].'</td>
			<td>'.$result["Rating"].'</td>
			<td>'.$result["TextComment"].'</td>
			</tr>'; 
		}
	}
	else if($type == "service"){
		while($result=mysqli_fetch_array($rs))
		{
			echo '<tr>
			<td>'.$result["name"].'</td>
			<td>'.$result["location"].'</td>
			<td>'.$result["sType"].'</td>
			<td>'.$result["Rating"].'</td>
			<td>'.$result["TextComment"].'</td>
			</tr>'; 
		}
	}
	else if($type == "room"){
		while($result=mysqli_fetch_array($rs))
		{
			echo '<tr>
			<td>'.$result["name"].'</td>
			<td>'.$result["location"].'</td>
			<td>'.$result["Room_no"].'</td>
			<td>'.$result["Rating"].'</td>
			<td>'.$result["TextComment"].'</td>
			</tr>'; 
		}
	}
	echo "</table>";


?>