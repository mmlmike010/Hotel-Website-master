<?php include 'header.php';?>


<div class="container">

       <h1 class="title">Statistics</h1>
	   
</div>

<?php
	echo "<div class=\"container\">";
	$data = mysqli_query($db, "SELECT count(*) as total FROM reservation r");
	$info = mysqli_fetch_assoc($data);
	echo "Reservations Created :" . $info["total"] . "\n";
	echo "</div>";
	
	echo "<div class=\"container\">";
	$data = mysqli_query($db, "SELECT count(*) as total FROM users r");
	$info = mysqli_fetch_assoc($data);
	echo "User Accounts Created :" . $info["total"];
	echo "</div>";
	
	
	echo "<div class=\"container\">";
	$query = "SELECT h.location FROM hotel h";
	$filter = mysqli_query($db, $query);
	$options = "";
	while($row = mysqli_fetch_array($filter)) {
		$options .= "<option>" . $row['location'] . "</option>";
	}
	$menu="<form id='hotel_filter' style = 'width: 20%;' border='3' cellpadding='10' id='hotel_filter' method='post' action=''>
		  <p><label>Filter by Hotel</label></p>
			<select name='filter' id='filter'>
			  " . $options . "
			</select>
		</form>";

	echo $menu;
	echo "</div>";
?>

<div class="container">
	<br>
       <div class="row">
             <input type = "button" id="search" name="search" class="btn btn-default" value = "Search"/> 
			<br>
		   	<br>
		  <div id="responsecontainer"></div>

	</br>         
       </div>
</div>

<script src="assets/jquery.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
	 
    $("#search").click(function() {                
		 
      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "getstatistics.php", 
		data: {type: "hotel", location: jQuery('#filter').val()},
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    	});
	});
});

</script>


<?php include 'footer.php';?> 