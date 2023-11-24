<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "university";

// Create connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

$student_id = $_GET['student_id'];

// Query to get student report
$query = "
    SELECT
        c.course_name,
        a.assignment_name,
        m.mark
    FROM
        marks m
    JOIN
        course c ON m.course_id = c.course_id
    JOIN
        assignment a ON m.assignment_id = a.assignment_id
    WHERE
        m.student_id = $student_id;
";

// Execute the query
$result = $connection->query($query);

if (!$result) {
  die("Query failed: " . $connection->error);
}

// Build the report HTML
$report = "<h2>Courses and Marks for Student</h2>";
$report .= "<table border='1'>
        <tr>
            <th>Course</th>
            <th>Assignment</th>
            <th>Mark</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
  $report .= "<tr>
            <td>{$row['course_name']}</td>
            <td>{$row['assignment_name']}</td>
            <td>{$row['mark']}</td>
          </tr>";
}

$report .= "</table>";

// Query to get highest and lowest marks
$marks_query = "
    SELECT
        MIN(mark) as min_mark,
        MAX(mark) as max_mark,
        AVG(mark) as avg_mark
    FROM
        marks
    WHERE
        student_id = $student_id;
";

$marks_result = $connection->query($marks_query);

if (!$marks_result) {
  die("Query failed: " . $connection->error);
}

$marks_row = $marks_result->fetch_assoc();

// Display highest, lowest, and average marks
$report .= "<h2>Performance Summary</h2>";
$report .= "<p>Lowest Mark: {$marks_row['min_mark']}</p>";
$report .= "<p>Highest Mark: {$marks_row['max_mark']}</p>";
$report .= "<p>Average Mark: {$marks_row['avg_mark']}</p>";

// Query to get the highest mark achiever
$highest_achiever_query = "
    SELECT
        s.student_id,
        s.student_name,
        c.course_name,
        a.assignment_name,
        m.mark
    FROM
        marks m
    JOIN
        student s ON m.student_id = s.student_id
    JOIN
        course c ON m.course_id = c.course_id
    JOIN
        assignment a ON m.assignment_id = a.assignment_id
    WHERE
        m.mark = (SELECT MAX(mark) FROM marks WHERE course_id = m.course_id);
";

$highest_achiever_result = $connection->query($highest_achiever_query);

if (!$highest_achiever_result) {
  die("Query failed: " . $connection->error);
}

$highest_achiever_row = $highest_achiever_result->fetch_assoc();

// Display highest mark achiever
$report .= "<h2>Highest Mark Achiever</h2>";
$report .= "<p>Student ID: {$highest_achiever_row['student_id']}</p>";
$report .= "<p>Student Name: {$highest_achiever_row['student_name']}</p>";
$report .= "<p>Course: {$highest_achiever_row['course_name']}</p>";
$report .= "<p>Assignment: {$highest_achiever_row['assignment_name']}</p>";
$report .= "<p>Mark: {$highest_achiever_row['mark']}</p>";

// Compare student's marks with the highest mark achiever
if ($marks_row['max_mark'] > $highest_achiever_row['mark']) {
  $report .= "<p>You performed better than the highest achiever!</p>";
} elseif ($marks_row['max_mark'] < $highest_achiever_row['mark']) {
  $report .= "<p>You can aim higher to beat the highest achiever.</p>";
} else {
  $report .= "<p>You achieved the same highest mark as the highest achiever.</p>";
}

// Provide personalized suggestions for improvement
$report .= "<h2>Performance Analysis and Suggestions</h2>";
$report .= "<ul>";

// Loop through each subject and provide personalized suggestions
$result->data_seek(0); // Reset result set pointer
while ($row = $result->fetch_assoc()) {
  if ($row['mark'] < $marks_row['avg_mark']) {
    $diff = $marks_row['avg_mark'] - $row['mark'];
    $report .= "<li>In {$row['course_name']} - {$row['assignment_name']}, your mark is {$diff} points below the average. Consider:</li>";
    $report .= "<ul>";
    $report .= "<li>Reviewing the assignment thoroughly.</li>";
    $report .= "<li>Seeking clarification on concepts you find challenging.</li>";
    $report .= "<li>Participating in group study sessions for better understanding.</li>";
    $report .= "</ul>";
  } else {
    $report .= "<li>Your performance in {$row['course_name']} - {$row['assignment_name']} is strong. Keep up the good work!</li>";
  }
}

$report .= "</ul>";

// Highlight assignments where the student's mark is significantly below the average
$report .= "<h2>Assignments with Significant Improvement Opportunities</h2>";
$report .= "<ul>";

$result->data_seek(0); // Reset result set pointer
while ($row = $result->fetch_assoc()) {
  $diff = $marks_row['avg_mark'] - $row['mark'];
  if ($diff > 10) {
    $report .= "<li>{$row['course_name']} - {$row['assignment_name']} has a significant improvement opportunity. Your mark is {$diff} points below the average.</li>";
  } else {
    $report .= "<li>No significant improvement opportunity found for {$row['course_name']} - {$row['assignment_name']} ({$diff} points below the average).</li>";
  }
}

$report .= "</ul>";

// Return the report HTML
echo $report;

// Close the database connection
$connection->close();
