<html> 
    <head>    
        <title>Registration Form</title> 
        <style>body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f1f1f1;
			text-align:center;
  background: url(OIP.jfif);
  background-repeat: no-repeat;
  background-size: 1500px 700px;
   background-attachment: fixed;
  background-position: 50% 50%;  
}

h2 {
  text-align: center;
}

form {
  width: 500px;
  margin: 0 auto;
  text-align: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;
}

.form_group {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

.form_group label {
  width: 120px;
  font-weight: bold;
}

.form_group input {
  width: 250px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.container {
  display: flex;
  flex-direction: column;
}
#clock {
        position: fixed; /* Fix the position of the element */
        bottom: 0; /* Position the element at the bottom of the screen */
        right: 0; /* Position the element at the right of the screen */
        margin: 10px; /* Add some margin to the element */}
        </style>
    </head>    
    <body>      
        <h2>Sign Up</h2>    
        <form name = "form1" action='registrationform1.php' method = "post" enctype = "multipart/form-data"onsubmit="return validateForm()">    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Name:</label>    
                    <input type="text" name="name" pattern="[A-Za-z]+" value="" required/>   
                </div>         
                <div class = "form_group">    
                    <label>Password:</label>    
                    <input type = "password" name = "passwd" value = "" required/>    
                </div>    
				<div><input type ="submit" value="sign up" required/>
					
            </div>   

        </form>  
        <div id="clock"></div>  
    </body> 
    <script>
     function updateClock() {
      // Get the current date and time
      var now = new Date();
      var date = now.toDateString();
      var time = now.toLocaleTimeString();

      // Insert the date and time into the clock div
      document.getElementById('clock').innerHTML = date + ' ' + time;
    }
setInterval(updateClock, 1000);  
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