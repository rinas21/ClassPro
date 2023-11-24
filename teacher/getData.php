<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$courseCount = $conn->query("SELECT COUNT(*) as count FROM course")->fetch_assoc()['count'];
$studentCount = $conn->query("SELECT COUNT(*) as count FROM student")->fetch_assoc()['count'];
$assignmentCount = $conn->query("SELECT COUNT(*) as count FROM assignment")->fetch_assoc()['count'];

$conn->close();

$data = [
  'courseCount' => $courseCount,
  'studentCount' => $studentCount,
  'assignmentCount' => $assignmentCount,
];

echo json_encode($data);
