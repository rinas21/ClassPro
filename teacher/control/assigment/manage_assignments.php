<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert assignment
if (isset($_POST['action']) && $_POST['action'] == 'addAssignment') {
  $assignmentName = $_POST['assignmentName'];
  $sql = "INSERT INTO `assignment` (`assignment_name`) VALUES ('$assignmentName')";
  $conn->query($sql);
}

// Update assignment
if (isset($_POST['action']) && $_POST['action'] == 'updateAssignment') {
  $assignmentId = $_POST['assignmentId'];
  $assignmentName = $_POST['assignmentName'];
  $sql = "UPDATE `assignment` SET `assignment_name`='$assignmentName' WHERE `assignment_id`='$assignmentId'";
  $conn->query($sql);
}

// Remove assignment
if (isset($_POST['action']) && $_POST['action'] == 'removeAssignment') {
  $assignmentId = $_POST['assignmentId'];
  $sql = "DELETE FROM `assignment` WHERE `assignment_id`='$assignmentId'";
  $conn->query($sql);
}

// Fetch assignments
$sql = "SELECT * FROM `assignment`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['assignment_id']}</td>";
    echo "<td>{$row['assignment_name']}</td>";
    echo "<td>";
    echo "<button onclick='editAssignment({$row['assignment_id']}, \"{$row['assignment_name']}\")'>Edit</button>";
    echo "<button onclick='removeAssignment({$row['assignment_id']})'>Remove</button>";
    echo "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='3'>No assignments available</td></tr>";
}

$conn->close();
