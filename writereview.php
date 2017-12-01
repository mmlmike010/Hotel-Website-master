<?php include 'header.php';?>

<?php
	$error="";
	if(!isset($_SESSION['login_user']))
	{
			header("Location: login.php");
	}

	$reviewID = rand(1,1000);
	//Check if there is already a reviewID in the database
	$sqlNumCheck = "SELECT * FROM review WHERE ReviewID = '$reviewID'";
	$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));

	while($count != 0)
	{
		$reviewID = rand(1,1000);
		$sqlNumCheck = "SELECT * FROM review WHERE ReviewID = '$reviewID'";
		$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		// All data sent from form 
		$reviewtype = mysqli_real_escape_string($db,$_POST['reviewtype']); 
		$reviewrating = mysqli_real_escape_string($db,$_POST['reviewrating']); 
		$reviewtext = mysqli_real_escape_string($db,$_POST['reviewtext']);	
		$hotelID = mysqli_real_escape_string($db,$_POST['hotelno']);
		
		
		$user = $_SESSION['login_user'];
		
		//Get the CID of the User here
		$getCID = "SELECT c.cid FROM customer c, users u WHERE c.cid = u.uid AND u.username='$user'";
		$query = mysqli_query($db, $getCID);
		//This should work no matter what
		//Get the first element in the array
		$cid = mysqli_fetch_array($query)[0];
		
		
		//LOTS OF ECHOS
		/*
		echo $cid;
		echo "<br>";
		echo $hotelID;
		echo "<br>";
		echo "Current user is ";
		echo $user;
		echo ("<br>");
		echo $reviewtype;
		echo("<br>");
		echo $reviewrating;
		echo("<br>");
		echo $reviewtext;
		echo("<br>");
		echo $reviewID;
		echo("<br>");
		*/
		
			//Actually add the entry here
			$sqlToAdd = "INSERT INTO review VALUES ('$reviewID', '$cid', '$reviewrating', '$reviewtext');";
			//$query = mysqli_query($db, $sqlToAdd);
			
			if($reviewtype == "breakfast")
			{
    			//echo "This is a breakfast review <br>";
				$breakfastType = mysqli_real_escape_string($db,$_POST['breakfasttype']);
				$sqlTypeToAdd = "INSERT INTO breakfastreview VALUES ('$reviewID', '$breakfastType', '$hotelID')";
    		}
			else if($reviewtype == "service")
			{
    			//echo "This is a service review <br>";
				$serviceType = mysqli_real_escape_string($db,$_POST['servicetype']);
				$sqlTypeToAdd = "INSERT INTO servicereview VALUES ('$reviewID', '$serviceType', '$hotelID')";
			}
			else if($reviewtype == "room")
			{
				//echo "This is a room review <br>";
				$roomNo = (int)mysqli_real_escape_string($db,$_POST['roomno']);
				$sqlTypeToAdd = "INSERT INTO roomreview VALUES ('$reviewID', '$roomNo', '$hotelID')";
			}
			else
			{
				$error = "Nothing selected for review type";
			}
		
		
			if (mysqli_query($db, $sqlToAdd) && mysqli_query($db, $sqlTypeToAdd)) 
			{
				$error =  "Review Added. Thank You!";
			} 
			else 
			{
				$error =  mysqli_error($db);
			}	
			
	}
?>
<script src="assets/jquery.js"></script>
<script src="assets/formjs.js"></script>

<div class="container">

<h1 class="title">Write a Review</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		
			<form action = "" method = "post"  class="wowload fadeIn">
			<div class="form-group" >	
				<select  class="div-toggle" data-target=".my-info-1" id="reviewtype" name="reviewtype"> 
					<option value="breakfast" data-show=".breakfast" selected="selected">Breakfast</option>
					<option value="room" data-show=".room">Room</option>
					<option value="service" data-show=".service">Service</option>
				</select>
			</div>
			<div class="form-group">
				<?php
						
							$hotelSql = mysqli_query($db,"SELECT HotelID, Location FROM Hotel");
							if(mysqli_num_rows($hotelSql))
							{
								$select= '<select class="div-toggle" id="hotelno" name="hotelno">';
								while($rs=mysqli_fetch_array($hotelSql))
								{
									$select.='<option value="'.$rs['HotelID'].'">'.$rs['Location'].'</option>';
								}
							}
							$select.='</select>';
							echo $select;
						?>
			</div>
			<div class="form-group">
				<div class="my-info-1">
  					<div class="breakfast hide">
						
						<select class="div-toggle" id="breakfasttype" name="breakfasttype">
						<script>
						
							$("#hotelno").change(function() 
							{
  								$("#breakfasttype").load("reviewform.php?type=breakfast&choice=" + $("#hotelno").val());
							});
							
						</script>
						</select>
						
						
  					</div>
					<div class="service hide">
					
						
						
						<select class="div-toggle" id="servicetype" name="servicetype">
						<script>
						
							$("#hotelno").change(function() 
							{
  								$("#servicetype").load("reviewform.php?type=service&choice=" + $("#hotelno").val());
							});
							
						</script>
						</select>
					</div>
					<div class="room hide">	
						<select class="div-toggle" id="roomno" name="roomno"> 
							<option value="1" >Room 1</option>
							<option value="2" >Room 2</option>
							<option value="3" >Room 3</option>
							<option value="4" >Room 4</option>
							<option value="5" >Room 5</option>
							<option value="6" >Room 6</option>
							<option value="7" >Room 7</option>
							<option value="8" >Room 8</option>
							<option value="9" >Room 9</option>
							<option value="10" >Room 10</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">	
				<select id="reviewrating" name="reviewrating"> 
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" selected="selected">5</option>
					<option value="6" >6</option>
					<option value="7" >7</option>
					<option value="8" >8</option>
					<option value="9" >9</option>
					<option value="10" >10</option>
				</select>
			</div>
			<div class="form-group">	
			<textarea class="form-control" rows="5" id="reviewtext" name="reviewtext"></textarea> 
			</div>
			<!--<button type="submit" value=" Submit " class="btn btn-default">Login</button> -->
			<input type = "submit" name="submit" class="btn btn-default" value = "Submit"/>
			<br />
			<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?>
			</form>
			</div>

       		</div>
       </div>
	</div>
</div>
<!-- form -->
	</div>
</div>
<?php include 'footer.php';?>