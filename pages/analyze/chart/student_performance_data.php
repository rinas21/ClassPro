<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$studentId = $_GET['studentId'];

// Fetch student marks
$sql = "SELECT course.course_name, marks.mark
        FROM marks
        INNER JOIN course ON marks.course_id = course.course_id
        WHERE marks.student_id = $studentId";
$result = $conn->query($sql);

$data = [
  'courseNames' => [],
  'studentMarks' => [],
  'averageMarks' => [],
  'highestMarks' => [],
  'minMark' => 0,
  'maxMark' => 0,
  'avgMark' => 0,
  'stdDevMark' => 0,
];

if ($result->num_rows > 0) {
  $marks = [];
  while ($row = $result->fetch_assoc()) {
    $data['courseNames'][] = $row['course_name'];
    $marks[] = $row['mark'];
  }

  $data['minMark'] = min($marks);
  $data['maxMark'] = max($marks);
  $data['avgMark'] = array_sum($marks) / count($marks);
  $data['stdDevMark'] = sqrt(array_sum(array_map('pow', $marks, array_fill(0, count($marks), 2))) / count($marks));

  $averageMarks = array_fill(0, count($marks), $data['avgMark']);
  $highestMarks = array_fill(0, count($marks), $data['maxMark']);

  $data['studentMarks'] = $marks;
  $data['averageMarks'] = $averageMarks;
  $data['highestMarks'] = $highestMarks;
}

echo json_encode($data);

$conn->close();
