<?php include 'header.php';?>


<?php
	$error="";
	$confirmation="";
	if(!isset($_SESSION['login_user']))
	{
			header("Location: login.php");
	}


	$invoiceNo = rand(1,1000);
	//Check if there is already a reviewID in the database
	$sqlNumCheck = "SELECT * FROM reservation WHERE InvoiceNo = '$invoiceNo'";
	$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));

	while($count != 0)
	{
		$invoiceNo = rand(1,1000);
		$sqlNumCheck = "SELECT * FROM reservation WHERE InvoiceNo = '$invoiceNo'";
		$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));
	}


	$user = $_SESSION['login_user'];
	//Get everything of the User here
	$getCID = mysqli_query($db,"SELECT c.CID, c.Email, c.Name, c.phone_no FROM customer c, users u WHERE c.cid = u.uid AND u.username='$user'");
	$rs=mysqli_fetch_array($getCID);
	$name = $rs['Name'];
	$email = $rs['Email'];
	$phoneNo = $rs['phone_no'];
	$cid = $rs['CID'];

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		
		$hotelID = (int)mysqli_real_escape_string($db,$_POST['hotelno']);
		$roomno = (int)mysqli_real_escape_string($db,$_POST['roomno']);
		
		$ccname = mysqli_real_escape_string($db,$_POST['ccname']);
		$ccaddress = mysqli_real_escape_string($db,$_POST['ccaddress']);
		$ccnum = mysqli_real_escape_string($db,$_POST['ccnum']);
		$ccdate = mysqli_real_escape_string($db,$_POST['ccyear']) . "/" . mysqli_real_escape_string($db,$_POST['ccmonth']) . "/00";
		$ccv = mysqli_real_escape_string($db,$_POST['ccv']);
		
		//echo $ccdate;
		if($ccname == NULL || $ccaddress == NULL || $ccnum == NULL || $ccv == NULL)
		{
			$error = "Missing credit card information"; 
		}
		
		$start = strtotime($_POST['checkin']);
		$end = strtotime($_POST['checkout']);
		$diffToday = ($start - strtotime(date('Y-m-d')));
		$diff = ($end - $start)/86400;
		
		//Add the credit card to the database
		$sqlToAdd = "INSERT INTO creditcard VALUES ('$ccnum','$ccdate','$ccaddress','$ccname','$ccv')";
		mysqli_query($db, $sqlToAdd);
		
		/*
		echo $start;
		echo "<br>";
		echo $end;
		echo "<br>";
		echo date('Y-m-d');
		
		echo "<br>";
		echo $diffToday;
		
		$start = date("Y-m-d", $start);
		$end = date("Y-m-d", $end);
		echo "<br>";
		echo $start;
		echo "<br>";
		echo $end;
		echo "<br>";
		*/
		
		if($hotelID == 0 || $roomno == 0)
		{
			$error .= "<br>Please enter a valid choice for hotel and room";
		}
		if($diff < 0 || $diffToday < 0)
		{
			$error .= "<br>Please enter a valid date range.";
			//$error .="<br> Please enter a valid choice for Hotel";
		}
		else
		{
			$start = date("Y-m-d", $start);
			$end = date("Y-m-d", $end);
			$sqlToAdd = "INSERT INTO reservation VALUES( $invoiceNo ,$cid, $ccnum, CAST('$start' as DATE), CAST('$end' as DATE))";
			mysqli_query($db, $sqlToAdd);
		}
		
	}

?>
<script src="assets/jquery.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
	 
    $("#calculatePrice").click(function() {                

	 var hotelno = $("#hotelno").val();
	 var roomno = $("#roomno").val();
	 var startdate = $("#checkin").val();
	 var enddate = $("#checkout").val();
	
	 
      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "checkprice.php", 
		data: {hotelno: hotelno, roomno: roomno, startdate: startdate, enddate: enddate},
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    	});
	});
});

</script>
<div class="container">

<!-- form -->
	<div class="contact">

		<div class="row">

		  <div class="col-sm-12">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="spacer">   		
						<h3>Make a reservation</h3>
						<form name="reserve" role="form" method="post" class="wowload fadeIn">

						<div class="form-group">
							<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
						</div>

						<div class="form-group">
							<input type="phone" class="form-control" name="phone" id="phone" value="<?php echo $phoneNo; ?>" placeholder="Phone">
						</div>  

						<div class="form-group">
							<div class="row">
								<div class="col-xs-6">
									<?php

										$hotelSql = mysqli_query($db,"SELECT HotelID, Location FROM hotel");
										if(mysqli_num_rows($hotelSql))
										{
											$select= '<select class="form-control" id="hotelno" name="hotelno">';
											$select.='<option value="0">Select a location</option>';
											while($rs=mysqli_fetch_array($hotelSql))
											{
												$select.='<option value="'.$rs['HotelID'].'">'.$rs['Location'].'</option>';
											}
										}
										$select.='</select>';
										echo $select;
									?>
								</div>        
								<div class="col-xs-6">
									<select id="roomno" name="roomno" class="form-control">
										<option value="0">Room</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-xs-4">
									Check-In
									<input type="date" class="form-control" id="checkin" name="checkin"  pattern="\d{1,2}-\d{1,2}-\d{4}" value="<?php echo date('Y-m-d'); ?>" />
								</div>
								<div class="col-xs-4">
									Check-Out
									<input type="date" class="form-control" id="checkout" name="checkout" pattern="\d{1,2}-\d{1,2}-\d{4}" value="<?php echo date('Y-m-d'); ?>" />
								</div>
								<div class="col-xs-4">

								</div>
							</div>
						</div>
						<div class="form-group">
							<h3>Payment</h3>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="ccname" id="ccname"  placeholder="Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="ccaddress" id="ccaddress" placeholder="Billing Address">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="ccnum" id="ccnum" placeholder="Credit Card Number" pattern="[0-9]{16}">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-3">
									<select class="form-control" name="ccmonth" id="ccmonth">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
								<div class="col-xs-3">
									<select class="form-control" name="ccyear" id="ccyear">
										<option value="2017">17</option>
										<option value="2018">18</option>
										<option value="2019">19</option>
										<option value="2020">20</option>
										<option value="2021">21</option>
										<option value="2022">22</option>
										<option value="2023">23</option>
									</select>
								</div>
								<div class="col-xs-3">
									<input type="text" class="form-control" name="ccv" id="ccv" placeholder="CCV" pattern="[1-9]{3}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-3">
									<input type = "submit" name="submit" class="btn btn-default" value = "Submit"/>
								</div>
								<div class="col-xs-4">
									<input type = "button"  id="calculatePrice" name="calculatePrice" class="btn btn-default" value = "Calculate Price" />
								</div>
								<div class="col-xs-3">
									<div id="responsecontainer"></div>
								</div>
							</div>
						</div>

							<br />
							<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
							<div style = "font-size:15px; color:black; margin-top:10px"><?php echo $confirmation; ?></div>
							
							</form>    
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>