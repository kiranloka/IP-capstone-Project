<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_credentials";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user credentials from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Encrypt the password (you should use the same encryption method as in registration)
$encrypted_password = md5($password);

// SQL query to check if the user exists in the database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$encrypted_password'";

// Execute the query
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User exists, login successful
    echo "Login successful!";
} else {
    // User does not exist or invalid credentials
    // echo "Invalid username or password!";
    header("Location:addCourse.html");
}

// Close the database connection
$conn->close();
?>
