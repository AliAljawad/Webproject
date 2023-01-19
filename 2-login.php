<?php
	if(isset($_POST['sid']) && isset($_POST['spasswd']))
	{
		require('1-connection.php');
		extract($_POST); //$sid and $spasswd
		$query = "SELECT * FROM students WHERE s_id = $sid;";
		$result = mysqli_query($link, $query);
		if (($result) && (mysqli_num_rows($result) == 1))
		{		
			$s_info = mysqli_fetch_assoc($result);
			if (($s_info['s_id']==$sid) && ($s_info['passwd']==$spasswd))
			{
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['s_id'] = $sid;
				$_SESSION['s_name'] = $s_info['name'];
				header('Location: 4-main.php');
			}
			else
			{
				echo "<script>window.alert('wrong username or password');</script>";
				header('Location: index.html');
			}
		}
		else
		{
			echo "<script>window.alert('Please fill all the empty fields');</script>";
			header('Location: index.html');
		}
		mysqli_close($link);
	}
	else
	{
		header('Location: index.html');
	}
?>