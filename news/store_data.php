<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $registerNumber = $_POST['registerNumber'];

    // Database connection
    $con = mysqli_connect("localhost", "root", "", "test");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "INSERT INTO user_data (name, registerNumber) VALUES ('$name', '$registerNumber')";
    mysqli_query($con, $query);

    mysqli_close($con);
    header("Location: display_data.php");
}
?>
