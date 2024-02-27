<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Catalog</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .course-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .course-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .course-card h2 {
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .course-card p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Course Catalog</h1>
        <div class="course-grid">
            <?php
            // Connect to your database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "courses";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch course details
            $sql = "SELECT title, description, image_url FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="course-card">';
                    echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
                    echo '<h2>' . $row["title"] . '</h2>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No courses available";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
