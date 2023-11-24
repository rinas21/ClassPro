<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert student
if (isset($_POST['action']) && $_POST['action'] == 'addStudent') {
  $studentName = $_POST['studentName'];
  $sql = "INSERT INTO `student` (`student_name`) VALUES ('$studentName')";
  $conn->query($sql);
}

// Update student
if (isset($_POST['action']) && $_POST['action'] == 'updateStudent') {
  $studentId = $_POST['studentId'];
  $studentName = $_POST['studentName'];
  $sql = "UPDATE `student` SET `student_name`='$studentName' WHERE `student_id`='$studentId'";
  $conn->query($sql);
}

// Remove student
if (isset($_POST['action']) && $_POST['action'] == 'removeStudent') {
  $studentId = $_POST['studentId'];
  $sql = "DELETE FROM `student` WHERE `student_id`='$studentId'";
  $conn->query($sql);
}

// Fetch students
$sql = "SELECT * FROM `student`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['student_id']}</td>";
    echo "<td>{$row['student_name']}</td>";
    echo "<td>";
    echo "<button onclick='editStudent({$row['student_id']}, \"{$row['student_name']}\")'>Edit</button>";
    echo "<button onclick='removeStudent({$row['student_id']})'>Remove</button>";
    echo "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>No students available</td></tr>";
}

$conn->close();
