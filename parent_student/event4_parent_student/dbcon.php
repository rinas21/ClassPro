
<?php
$conn = new mysqli('localhost', 'root', '', 'demo1');
if ($conn->connect_error) {
  die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
?>