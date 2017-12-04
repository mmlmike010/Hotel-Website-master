<?php include 'session.php';?>
<?php

	$type = mysqli_real_escape_string($db, $_GET['type']);

	echo "<table style='width: 100%;' border='3' cellpadding='10'>";
	echo "<tr>";
	echo "<th width = 30%>User</th>";
	echo "<th width = 20%>Rating</th>";
	echo "<th width = 50%>Comment</th>";
	echo "</tr>";

	if($type == "breakfast")
	{
		$sql = "SELECT c.name, r.Rating, r.TextComment FROM review r, customer c, breakfastreview br WHERE r.CID = c.CID AND r.ReviewID = br.ReviewID";
	}
	else if($type == "room")
	{
		$sql = "SELECT c.name, r.Rating, r.TextComment FROM review r, customer c, servicereview sr WHERE r.CID = c.CID AND r.ReviewID = sr.ReviewID";
	}
	else if($type == "service")
	{
		$sql = "SELECT c.name, r.Rating, r.TextComment FROM review r, customer c, roomreview rr WHERE r.CID = c.CID AND r.ReviewID = rr.ReviewID";
	}

	$rs = mysqli_query($db,$sql);

	while($result=mysqli_fetch_array($rs))
	{
		echo '<tr>
		<td>'.$result["name"].'</td>
		<td>'.$result["Rating"].'</td>
		<td>'.$result["TextComment"].'</td>
		</tr>';
	}
	





	echo "</table>";


?>