<?php include 'header.php';?>

<?php

	$error="";
	if(isset($_POST['signup']))
	{
		header("Location: signup.php");
	}
	else if(isset($_POST['login']))
	{ 

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form 
			$myusername = mysqli_real_escape_string($db,$_POST['username']);
			$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
			
			//Create the SQL command and try to connect to the server to see if the entry is in the database
			
			$sql = "SELECT fname FROM users WHERE username = '$myusername' and pw = '$mypassword'";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$active = $row['active'];

			$count = mysqli_num_rows($result);

			// If result matched $myusername and $mypassword, table row must be 1 row

			if($count == 1) 
			{
				$_SESSION['login_user'] = $myusername;
				header("location: dashboard.php");
			}
			else 
			{
				$error = "Your Login Name or Password is invalid";
			}
		}
	}
?>
<div class="container">

<h1 class="title">Login</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Login</h4>
			<form action = "" method = "post">
			<div class="form-group">	
			<input type="text" class="form-control" name="username" id="username" placeholder="Name">
			</div>
			<div class="form-group">
			<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
			</div>
			<!--<button type="submit" value=" Submit " class="btn btn-default">Login</button> -->
			<input type = "submit" name="login" class="btn btn-default" value = "Log In"/>
			<input type = "submit" name="signup" class="btn btn-default" value = "Sign Up"/>
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