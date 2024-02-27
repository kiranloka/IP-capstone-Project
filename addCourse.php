<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "courses";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch course details from the form
$title = $_POST['title'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];

// SQL query to insert the course details into the database
$sql = "INSERT INTO courses (title, description, image_url) VALUES ('$title', '$description', '$image_url')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Close the database connection
    $conn->close();
    
    // Redirect the user to the display courses page
    header("Location: display.php");
    exit; // Make sure to exit after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
