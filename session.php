<?php

	include('config.php');
	session_start();
	$loginst = 0;

	if( isset($_SESSION['login_user']))
	{
		$user_check = $_SESSION['login_user'];

		$ses_sql = mysqli_query($db,"SELECT fname FROM users WHERE username = '$user_check' ");

		$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

		$login_session = $row['fname'];
		if(!empty($login_session)) 
		{
			$loginst = 1;
		}
	}
?>