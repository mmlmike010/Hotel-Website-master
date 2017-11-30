<?php include 'session.php';?>
<?php

	$hotelno = mysqli_real_escape_string($db,$_GET['hotelno']);
	$roomno = mysqli_real_escape_string($db,$_GET['roomno']);
	if($hotelno == 0 || $roomno == 0)
	{
		return;
	}
	$start = strtotime($_GET['startdate']);
	$end = strtotime($_GET['enddate']);
	$diff = ($end - $start)/86400;
	$startDate = date("Y-m-d", $start);
	$endDate = date("Y-m-d", $end);
	$discount = 0;

	//echo $diff;
	//echo "<br>";


	$sqlPrice = mysqli_query($db,"SELECT r.price FROM Room r WHERE r.hotelID = '$hotelno' AND r.Room_no = '$roomno' ");
	$rs = mysqli_fetch_array($sqlPrice);
	$price = $rs['price'];
	
	$sqlDiscount = mysqli_query($db,"SELECT o.discount FROM offerroom o WHERE CAST('$startDate' as DATE) BETWEEN o.SDate AND o.EDate");
	
	if(mysqli_num_rows($sqlDiscount) == 0)
	{
		$discount = 0;
	}
	else
	{
		$rs = mysqli_fetch_array($sqlDiscount);
		$discount = $rs['discount'];
 	}
		$totalPrice = $price;
		$totalDiscount = $discount;
	
	
 	$totalCost = $totalPrice - $totalDiscount;
	/*
	Made this more complicated than I realized. Honestly...
	if(mysqli_num_rows(mysqli_query($db, $sqlDiscount)) == 0)
	{
		//This means that the start dates doesn't coalign with between the discount date range
		//Try the end date?
		$sqlDiscount = "SELECT * FROM offerroom o WHERE CAST('$end' as DATE) BETWEEN o.SDate AND o.EDate";
		if(mysqli_num_rows(mysqli_query($db, $sqlDiscount)) == 0)
		{
			//This means no discount avaiable I guess
			$discount = 0;
		}
		else if(mysqli_num_rows(mysqli_query($db, $sqlDiscount)) == 1)
		{
			//There a discount avaiable from the end date yay.
		}
	
	
	}
	else if(mysqli_num_rows(mysqli_query($db, $sqlDiscount)) == 1)
	{
		//Theres a discount avaible from the first date yay.
		
		
	}*/

	//echo $price;
	//echo "<br>";
	//echo $discount;
	//echo "<br";
	//echo $totalPrice;
	//echo "<br>";
	//echo $totalDiscount;
	
 	echo "Total Price is: $$totalCost per night";	

?>