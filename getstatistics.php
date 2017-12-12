<?php include 'session.php';?>
<?php

	$type = mysqli_real_escape_string($db, $_GET['type']);
	$location = mysqli_real_escape_string($db, $_GET['location']);

	echo "<table style='width: 100%;' border='3' cellpadding='10'>";
	echo "<tr>";
	echo "<th width = 50%>Review Type</th>";
	echo "<th width = 25%>Average Score</th>";
	echo "<th width = 25%>Score StDev</th>";
	echo "</tr>";
	
	// select average room rating
	$sql = "SELECT AVG(r.Rating), STDDEV(r.Rating)
			FROM roomreview rr, review r, hotel h
			WHERE rr.ReviewID = r.ReviewID AND h.HotelID = rr.hotelNo 
			AND h.location LIKE '". mysqli_real_escape_string( $db, $location ) ."'";

	$rs = mysqli_query($db,$sql);	

	$result = mysqli_fetch_array($rs);
	echo '<tr>
	<td>Room Reviews</td>
	<td>'.$result["AVG(r.Rating)"].'</td>
	<td>'.$result["STDDEV(r.Rating)"].'</td>
	</tr>'; 
	
	// select average breakfast rating
	$sql = "SELECT AVG(r.Rating), STDDEV(r.Rating)
			FROM breakfastreview br, review r, hotel h
			WHERE br.ReviewID = r.ReviewID AND h.HotelID = br.hotelNo 
			AND h.location LIKE '". mysqli_real_escape_string( $db, $location ) ."'";

	$rs = mysqli_query($db,$sql);	

	$result = mysqli_fetch_array($rs);
	echo '<tr>
	<td>Breakfast Reviews</td>
	<td>'.$result["AVG(r.Rating)"].'</td>
	<td>'.$result["STDDEV(r.Rating)"].'</td>
	</tr>';

	// select average service rating
	$sql = "SELECT AVG(r.Rating), STDDEV(r.Rating)
			FROM servicereview sr, review r, hotel h
			WHERE sr.ReviewID = r.ReviewID AND h.HotelID = sr.hotelNo 
			AND h.location LIKE '". mysqli_real_escape_string( $db, $location ) ."'";

	$rs = mysqli_query($db,$sql);	

	$result = mysqli_fetch_array($rs);
	echo '<tr>
	<td>Service Reviews</td>
	<td>'.$result["AVG(r.Rating)"].'</td>
	<td>'.$result["STDDEV(r.Rating)"].'</td>
	</tr>';
	echo "</table>";
	
	//reservation table
	echo "<table style='width: 100%;' border='3' cellpadding='10'>";
	echo "<tr>";
	echo "<th width = 10%>Invoice Number</th>";
	echo "<th width = 40%>Customer Name</th>";
	echo "<th width = 25%>Check In</th>";
	echo "<th width = 25%>Check Out</th>";
	echo "</tr>";
	
	$sql = "SELECT c.name, r.InvoiceNO, r.checkIn, r.checkOut 
		FROM reservation r, customer c, hotel h 
		WHERE r.CID = c.CID AND h.HotelID = r.hotelID 
		AND h.location LIKE '". mysqli_real_escape_string( $db, $location ) ."'";
	$rs = mysqli_query($db,$sql);		
	
	while($result=mysqli_fetch_array($rs))
	{
		echo '<tr> 
		<td>'.$result["InvoiceNO"].'</td>
		<td>'.$result["name"].'</td>
		<td>'.$result["checkIn"].'</td>
		<td>'.$result["checkOut"].'</td>
		</tr>'; 
	}
	echo "</table>";
?>