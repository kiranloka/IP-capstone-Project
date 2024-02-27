<?php
// Establish database connection (Replace with your credentials)
$servername = "localhost";
$username = "username";
$password = "password";
$database = "courses";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute SQL query to retrieve courses
$sql = "SELECT title, description, image_url FROM courses";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Initialize an array to store courses
    $courses = array();

    // Fetch data from each row
    while ($row = $result->fetch_assoc()) {
        // Add course data to the courses array
        $courses[] = array(
            'title' => $row['title'],
            'description' => $row['description'],
            'image_url' => $row['image_url']
        );
    }

    // Set the response header to indicate JSON content
    header('Content-Type: application/json');

    // Output the courses array as JSON
    echo json_encode($courses);
} else {
    // If no courses are found, return an empty array
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
