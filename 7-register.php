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
		<title>Register</title>
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
body {
  font-family: sans-serif;
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background: url('russianAl.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  background-position: 50% 50%;
}

hr {
  border: 0;
  height: 1px;
  background-color: #ccc;
  margin: 20px 0;
  background-color: white;
}

h1 {
  text-align: center;
  font-size: 2em;
  color: #ff9800;
  margin-bottom: 20px;
  background-color: white;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: white;
}

li::before {
  content: "\2605";
  margin-right: 10px;
  background-color: white;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
  background-color: white;
}

form input[type="text"] {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

form input[type="submit"] {
  width: 80%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #45a049;
}
</style>
	</head>
	
	<body>
	<a href="4-main.php" class="go-back-button">Go back</a>
	<hr/>
	<?php
	require_once('1-connection.php');
	$query = "SELECT * FROM courses ORDER BY course_code, Day;";
	$result = mysqli_query($link, $query);
	if (($result) && (mysqli_num_rows($result) > 0))
	{	
		echo 'List of courses available for ' .$_SESSION['s_name'] . ':';
		echo '<ul>';
		while ($row = mysqli_fetch_assoc($result))
		{
			echo '<li>' . $row['course_code'] . '-' . $row['Day'] . '</li>';
		}
		echo '</ul>';
		echo '<hr />';
		
		echo 'Enter the data for the course you want to register:';
		echo '<form action="8-registercourse.php" onsubmit="return validateForm()">';
		echo '<input type="text" name="ccode" placeholder="Course Code"/><br/>';
		echo '<input type="text" name="csection" placeholder="Course Section"/><br/>';
		echo '<input type="submit" value="Register course"/>';
		echo '</form>';
	}
	mysqli_close($link);
	?>
	</body>
  <script>
    function validateForm() {
  // Get all the input elements in the form
  var inputs = document.getElementsByTagName("input");

  // Loop through all the input elements
  for (var i = 0; i < inputs.length; i++) {
    // Check if the current input element is empty
    if (inputs[i].value == "") {
      // If the input element is empty, display an alert message and return false
      alert("Please fill in all the fields.");
      return false;
    }
  }

  // If all the fields are filled in, return true
  return true;
}</script>
</html>