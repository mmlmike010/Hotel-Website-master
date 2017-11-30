<?php include 'header.php';?>

<?php

	if(isset($_SESSION['login_user']))
	{
		 header("Location: login.php");
	}
	$error="";


	$uid = rand(1,1000);
	//Check if there is already a UID in the database
	$sqlNumCheck = "SELECT * FROM Users WHERE uid = '$uid'";
	$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));

	while($count != 0)
	{
		$uid = rand(1,1000);
		$sqlNumCheck = "SELECT * FROM Users WHERE uid = '$uid'";
		$count = mysqli_num_rows(mysqli_query($db, $sqlNumCheck));
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		// All data sent from form 
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']); 
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']); 
		$fullname = $firstname;
		$fullname .= " ";
		$fullname .= $lastname;
		echo $fullname;
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$phone = mysqli_real_escape_string($db, $_POST['phonenum']);

		$usersql = "INSERT INTO Users VALUES('$uid', '$username','$password','$firstname','$lastname', false)";
		$custsql = "INSERT INTO Customer VALUES('$uid', '$email','$address','$phone','$fullname')";
		if (mysqli_query($db, $usersql) && mysqli_query($db, $custsql)) 
		{
			$error =  "New user created successfully";
		} 
		else 
		{
			$error =  mysqli_error($db);
		}	
		
	}
?>
<div class="container">

<h1 class="title">Sign Up</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Sign Up</h4>
			<form action = "" method = "post"  class="wowload fadeIn">
			<div class="form-group">	
			<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="address" id="address" placeholder="Address">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="phonenum" id="phonenum" placeholder="Phone Number">
			</div>
			<div class="form-group">	
			<input type="text" class="form-control" name="username" id="username" placeholder="Username">
			</div>
			<div class="form-group">
			<input type="password" class="form-control" name="password" id="password" placeholder="password">
			</div>
			<!--<button type="submit" value=" Submit " class="btn btn-default">Login</button> -->
			<input type = "submit" name="login" class="btn btn-default" value = "Sign Up"/>
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
<?php include 'footer.php';?>