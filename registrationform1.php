<?php
require '1-connection.php';
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$passwd = mysqli_real_escape_string($link, $_POST['passwd']);

// Attempt insert query execution
$sql_add_query = "INSERT INTO students (name, passwd) values ('$name','$passwd')";
if(mysqli_query($link, $sql_add_query)){
    // Get the last inserted s_id
    $s_id = mysqli_insert_id($link);
    // Display success message and redirect to index.html
    echo "<script>alert('Records added successfully. Your s_id is: $s_id'); window.location.href='index.html';</script>";
} else{
    echo "ERROR: Could not able to execute $sql_add_query. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>




