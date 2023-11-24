<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the course count for each student
$query = "SELECT s.student_name, COUNT(DISTINCT m.course_id) AS course_count
          FROM student s
          LEFT JOIN marks m ON s.student_id = m.student_id
          GROUP BY s.student_id, s.student_name";

$result = $conn->query($query);

// Fetch the data into an associative array
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Convert the data to JSON format
echo json_encode($data);

$conn->close();
?>
