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
		<title>View</title>
		<meta charset="UTF-8" />
		<style>
			a.go-back-button {
  display: inline-block;
  background-color: #ff9800;
  color: white;
  padding: 14px 20px;
  text-align: center;
  text-decoration: none;
  border-radius: 4px;
}

a.go-back-button:hover {
  background-color: #e68a00;
}
table {
  border-collapse: collapse;
  width: 80%;
  margin: 0 auto;
  background-color: white;
}

th, td {
  text-align: left;
  padding: 8px;
  background-color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
  font-size: 2em;
  color: #ff9800;
}

form {
  display: flex;
  align-items: center;
}

select {
  width: 200px;
  margin-right: 10px;
  font-size: 1em;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

a img {
  width: 20px;
  height: 20px;
}
body {
  font-family: sans-serif;
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background: url('View.jpeg');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  background-position: 50% 50%;
}
</style>
	</head>
	<body>
	<a href="4-main.php" class="go-back-button">Go back</a>
	<h1>Registered Classes for <?=strtoupper($_SESSION['s_name'])?></h1>
	<?php
		require_once('1-connection.php');
		$sid = $_SESSION['s_id'];
		$query  = "SELECT courses.c_id, courses.course_code, courses.Day ";
		$query .= "FROM courses ";
		$query .= "INNER JOIN registered ON courses.c_id = registered.c_id ";
		$query .= "WHERE registered.s_id = $sid;";
		//$query .= "INNER JOIN students ON registered.s_id = students.s_id ";
		//$query .= "WHERE students.s_id = $sid;";
		
		$result = mysqli_query($link, $query);
		if (($result) && (mysqli_num_rows($result) > 0))
		{
			echo '<table border="1" width="50%">';
			echo '<tr><th>Course code</th><th>Section</th>
				  <th>Change section</th><th>Drop</th><tr>';
			while ($row = mysqli_fetch_assoc($result))
			{
				echo '<tr align="center"><td>' . $row['course_code'] . '</td><td>' . $row['Day']. '</td>';
				echo '<td>';
				echo '<form action="6-changesection.php">';
				echo '<select name="newsection">';
				$query = "SELECT * from courses WHERE course_code = '".$row['course_code']."';"; 
				$secresult = mysqli_query($link, $query);
				while ($secrow = mysqli_fetch_assoc($secresult))
				{
					echo '<option value="' . $secrow['c_id'].'">'.$secrow['Day'].'</option>';
				}
				echo '</select>';
				echo '<input type="hidden" name="oldsection" value="' . $row['c_id'] . '" />';
				echo '<input type="submit" value="change" />';				
				echo '</form>';
				echo '</td>';
				echo '<td><a href="9-drop.php?cid='.$row['c_id'].'"><img src="withdraw.png"/></a></td></tr>';
			}
			echo '</table>';
		}
	?>
	</body>
</html>