<?php
// Assuming you have a database connection already established

// Function to get counts
function getCounts()
{
  $conn = new mysqli("localhost", "root", "", "university");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = array();

  // Get student count
  $query = "SELECT COUNT(*) AS student_count FROM student";
  $result['students'] = $conn->query($query)->fetch_assoc()['student_count'];

  // Get course count
  $query = "SELECT COUNT(*) AS course_count FROM course";
  $result['courses'] = $conn->query($query)->fetch_assoc()['course_count'];

  // Get assignment count
  $query = "SELECT COUNT(*) AS assignment_count FROM assignment";
  $result['assignments'] = $conn->query($query)->fetch_assoc()['assignment_count'];

  $conn->close();

  return $result;
}

// Fetch counts and return as JSON
echo json_encode(getCounts());
