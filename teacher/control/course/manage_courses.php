<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert course
if (isset($_POST['action']) && $_POST['action'] == 'addCourse') {
  $courseName = $_POST['courseName'];
  $sql = "INSERT INTO `course` (`course_name`) VALUES ('$courseName')";
  $conn->query($sql);
}

// Update course
if (isset($_POST['action']) && $_POST['action'] == 'updateCourse') {
  $courseId = $_POST['courseId'];
  $courseName = $_POST['courseName'];
  $sql = "UPDATE `course` SET `course_name`='$courseName' WHERE `course_id`='$courseId'";
  $conn->query($sql);
}

// Remove course
if (isset($_POST['action']) && $_POST['action'] == 'removeCourse') {
  $courseId = $_POST['courseId'];
  $sql = "DELETE FROM `course` WHERE `course_id`='$courseId'";
  $conn->query($sql);
}

// Fetch courses
$sql = "SELECT * FROM `course`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['course_id']}</td>";
    echo "<td>{$row['course_name']}</td>";
    echo "<td>";
    echo "<button onclick='editCourse({$row['course_id']}, \"{$row['course_name']}\")'>Edit</button>";
    echo "<button onclick='removeCourse({$row['course_id']})'>Remove</button>";
    echo "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>No courses available</td></tr>";
}

$conn->close();
