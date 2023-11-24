<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "university";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$response = [];

if (isset($_GET['studentId']) && isset($_GET['subjectId'])) {
  $studentId = $_GET['studentId'];
  $subjectId = $_GET['subjectId'];

  $sql = "SELECT term, mark FROM student_record WHERE student_id = $studentId AND course_id = $subjectId ORDER BY term";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $response[] = $row['mark'];
  }
} else {
  $response['error'] = "Missing studentId or subjectId";
}

echo json_encode($response);

$conn->close();
