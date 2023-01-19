<?php
	session_start();
	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
	{
		header('Location: index.html');
	}
	else
	{
		if (isset($_GET['oldsection']) && isset($_GET['newsection']))
		{
			require_once('1-connection.php');
			extract($_GET);
			$sid = $_SESSION['s_id'];
			$query = "UPDATE registered SET c_id = $newsection "; 
			$query .="WHERE c_id = $oldsection AND s_id = $sid;";
			$result = mysqli_query($link, $query);
			mysqli_close($link);
		} 
		header('Location: 5-view.php');
	}
?>