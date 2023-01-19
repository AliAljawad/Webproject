<?php
	session_start();
	if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
	{
		header('Location: index.html');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Main</title>
		<meta charset="UTF-8" />
		<style>
			body {
background: url('students.jfif');
background-repeat: no-repeat;
background-size: 1000px 700px;
background-attachment: fixed;
background-position: 50% 50%;
z-index: 0;  
}
h1 {
  text-align: center;
  font-size: 2em;
  color: white;
  text-shadow: 2px 2px 4px #000000;
  margin: 20px 0;
}
a {
  color: white;
  text-decoration: none;
  font-size: 1.5em;
  transition: all 0.3s ease;
}

a:hover {
  color: #ff9800;
}
</style>
	</head>
	<link rel="stylesheet" type="text/css" href="5-NavStyle.css">
	<h1 align="center"><?=strtoupper($_SESSION['s_name'])?>'s Dahsboard</h1>
	<ul>
	<li><a href="5-view.php">View registered courses</a></li>
	<li><a href="7-register.php">register</a></li>
	<li><a href="3-logout.php">logout</a></li>
</ul>
<body>
	</body>
</html>