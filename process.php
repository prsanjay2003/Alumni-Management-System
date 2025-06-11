<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "staff";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get values from the form
$value1 = mysqli_real_escape_string($connection, $_POST['value1']);
$value2 = mysqli_real_escape_string($connection, $_POST['value2']);
$value3 = mysqli_real_escape_string($connection, $_POST['value3']);
$value4 = mysqli_real_escape_string($connection, $_POST['value4']);

// Insert values into the database
$sql = "INSERT INTO new (column1, column2, column3, column4) VALUES ('$value1', '$value2', '$value3', '$value4')";
$result = mysqli_query($connection, $sql);

if ($result) {
    echo "Values inserted successfully.";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
