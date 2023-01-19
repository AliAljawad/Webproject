<?php
	session_start();
	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) 
	{
		header('Location: index.html');
	}
	else
	{
		if (isset($_GET['ccode']) && isset($_GET['csection']))
		{
			require_once('1-connection.php');
			extract($_GET);
			$query = "SELECT c_id FROM COURSES WHERE course_code = '$ccode' AND Day = '$csection';"; 
			$result = mysqli_query($link, $query);
			if (($result) && (mysqli_num_rows($result) == 1))
			{
				$c_info = mysqli_fetch_assoc($result);
				$cid = $c_info['c_id'];
				$sid = $_SESSION['s_id'];
				$query = "INSERT INTO registered (s_id,c_id) VALUES($sid,$cid);";
				$result = mysqli_query($link, $query);
				header('Location: 5-view.php');
			}
			else
			{
				header('Location: 6-register.php');
			}
			mysqli_close($link);
		}
		else
		{
			header('Location: 6-register.php');
		}
	}
?>