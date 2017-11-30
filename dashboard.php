<?php include 'header.php';?>
<?php

	if($_SESSION['login_user']==NULL)
	{
		 header("Location: login.php");
	}
?>
   <div class="container">

       <h1 class="title">Welcome <?php echo $_SESSION['login_user']; ?> </h1>
       <div class="row">
              <div class="col-sm-4"><h4><a href="makereservation.php">Make a reservation</a></h4></div>
              <div class="col-sm-4"><h4><a href="writereview.php">Write a review</a></h4></div>              
       </div>
   </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include 'footer.php';?>