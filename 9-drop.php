<?php
	session_start();
	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
	{
		header('Location: index.html');
	}
	else
	{
		if (isset($_GET['cid']))
		{
			require_once('1-connection.php');
			extract($_GET);
			$sid = $_SESSION['s_id'];
			$query = "DELETE FROM registered WHERE s_id = $sid AND c_id = $cid;"; 
			$result = mysqli_query($link, $query);
			mysqli_close($link);
		}
		header('Location: 5-view.php');
	}
?>