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

<script src="assets/jquery.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
	 
    $("#room").click(function() {                
		 
      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "getreviews.php", 
		data: {type: "room"},
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    	});
	});
	$("#breakfast").click(function() {                
		 
      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "getreviews.php", 
		data: {type: "breakfast"},
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    	});
	});
	$("#service").click(function() {                
		 
      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "getreviews.php", 
		data: {type: "service"},
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

       <h1 class="title">Statistics</h1>
	   
</div>
<?php include 'footer.php';?> 