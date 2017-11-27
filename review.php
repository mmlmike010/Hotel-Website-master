<?php include 'header.php';?>
<?php

	if($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			// username and password sent from form 
			
			$sql = "";
			$result = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$active = $row['active'];

			$count = mysqli_num_rows($result);

		}


?>
<div class="container">

       <h1 class="title">Reviews</h1>
       <div class="row">
            <form action = "" method = "post">
             <input type = "submit" name="room" class="btn btn-default" value = "Room Review"/>
             <input type = "submit" name="breakfast" class="btn btn-default" value = "Breakfast Review"/>
             <input type = "submit" name="service" class="btn btn-default" value = "Service Review"/>   
		   </form>  
		   </br>
               <table style="width: 100%;" border="3" cellpadding="10">
					  <tr>
						<th width = 30%>User</th>
						<th width = 50%>Comment</th>
						<th width = 20%>Rating</th>
					  </tr>
					  <tr>
						<td>Bob Marley</td>
						<td>Great Hotel, can't wait to come back here again. </td>
						<td>7/10</td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
				</table>
	</br>         
       </div>
</div>
<?php include 'footer.php';?> 