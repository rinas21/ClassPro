<?php
// Include database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentId'])) {
    $studentId = $_POST['studentId'];

    // Query to retrieve student performance information
    // Modify the query as needed based on your specific requirements
    $query = "
        SELECT student.student_name, 
               marks.mark,
               course.course_name,
               assignment.assignment_name
        FROM marks
        JOIN student ON marks.student_id = student.student_id
        JOIN course ON marks.course_id = course.course_id
        JOIN assignment ON marks.assignment_id = assignment.assignment_id
        WHERE student.student_id = $studentId
        ORDER BY marks.mark DESC
        LIMIT 1ddsddsd
    ";

    // Execute the query and fetch the result
    // Replace the following lines with your actual database connection code
    $conn = new mysqli("localhost", "root", "", "university");
    $result = $conn->query($query);

    // Process the result and generate asasasthe report
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentName = $row['student_name'];
        $highestMark = $row['mark'];
        $courseName = $row['course_name'];
        $assignmentName = $row['assignment_name'];

        // Additional processing and calculations can be done here

        // Output the report in JSON format
        echo json_encode([
            'studentName' => $studentName,
            'highestMark' => $highestMark,
            'courseName' => $courseName,
            'assignmentName' => $assignmentName,
            // Add more fields as needed
        ]);
    } else {
        echo json_encode(['error' => 'No data found for the specified student ID']);
    }

    // Close the database connection
    $conn->close();
}
