<?php
// Start the session
session_start();

// Simulated user data for authentication
$valid_username = "admin";
$valid_password = "password123";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: adminhome.php"); // Redirect to home page
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password.";
    }
}
?>
