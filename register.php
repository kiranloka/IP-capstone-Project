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

// Encrypt the password (you should use a more secure method, like hashing)
$encrypted_password = md5($password);

// SQL query to insert the user credentials into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$encrypted_password')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    header("Location: login.html");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
