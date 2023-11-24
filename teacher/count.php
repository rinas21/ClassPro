<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to get average marks for each course
$query = "
    SELECT c.course_name, AVG(m.mark) AS avg_mark
    FROM course c
    LEFT JOIN marks m ON c.course_id = m.course_id
    GROUP BY c.course_id, c.course_name
";

$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = [
    'course_name' => $row['course_name'],
    'avg_mark' => $row['avg_mark'],
  ];
}

// Close connection
$conn->close();

// Convert data to JSON format
$json_data = json_encode($data);

echo $json_data;
